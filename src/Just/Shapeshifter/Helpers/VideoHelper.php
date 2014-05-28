<?php  namespace Just\Shapeshifter\Helpers;

class VideoHelper
{
    public static function preview($url, $width = 160, $height = 90)
    {
        $tag = "<div class='video'><iframe style='margin:0;' src='%s' width='{$width}' height='{$height}'></iframe></div>";
        $vimeoID = static::getVimeoID($url);

        if ($vimeoID)
        {
            return sprintf($tag,
                "//player.vimeo.com/video/{$vimeoID}?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff"
            );
        }

        $youtubeID = static::getYoutubeID($url);
        if ($youtubeID) {
            return sprintf($tag,
                "//youtube.com/embed/{$youtubeID}?modestbranding=1&showinfo=0&controls=0&rel=0&autohide=1"
            );
        }

        return '';
    }

    public static function getYoutubeID($url) {
        $pattern =
            '%^# Match any YouTube URL
            (?:https?://)?  # Optional scheme. Either http or https
            (?:www\.)?      # Optional www subdomain
            (?:             # Group host alternatives
              youtu\.be/    # Either youtu.be,
            | youtube\.com  # or youtube.com
              (?:           # Group path alternatives
                /embed/     # Either /embed/
              | /v/         # or /v/
              | /watch\?v=  # or /watch\?v=
              )             # End path alternatives.
            )               # End host alternatives.
            ([\w-]{10,12})  # Allow 10-12 for 11 char YouTube id.
            $%x'
        ;

        preg_match($pattern, $url, $matches);

        return isset($matches[1]) ? $matches[1] : false;
    }

    public static function getVimeoID( $url ) {
        $regex = '~
		# Match Vimeo link and embed code
		(?:<iframe [^>]*src=")?         # If iframe match up to first quote of src
		(?:                             # Group vimeo url
				https?:\/\/             # Either http or https
				(?:[\w]+\.)*            # Optional subdomains
				vimeo\.com              # Match vimeo.com
				(?:[\/\w]*\/videos?)?   # Optional video sub directory this handles groups links also
				\/                      # Slash before Id
				([0-9]+)                # $1: VIDEO_ID is numeric
				[^\s]*                  # Not a space
		)                               # End group
		"?                              # Match end quote if part of src
		(?:[^>]*></iframe>)?            # Match the end of the iframe
		(?:<p>.*</p>)?                  # Match any title information stuff
		~ix';

        preg_match( $regex, $url, $matches );

        return isset($matches[1]) ? $matches[1] : false;
    }

} 

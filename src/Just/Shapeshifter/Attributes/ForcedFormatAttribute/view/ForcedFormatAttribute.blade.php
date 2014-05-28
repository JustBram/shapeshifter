<div class="form-group">
    <div class="form-label">
        {{ Form::label($name, $label) }}
    </div>
    <div class="form-field">
        <div class="form-control">
            {{ Form::text($name, null, array('class' => 'js-mask', 'data-mask' => $format)) }}
        </div>
        @include('shapeshifter::layouts.helptext')
    </div>
</div>

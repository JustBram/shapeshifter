<div class="form-group">
    <div class="form-label">
        {{ Form::label($name, $label) }}
    </div>
    <div class="form-field">
    	<div class="form-control">
    		<div class="" style="width: 50%;">
        		{{ Form::text($name, null, array('class' => 'datepicker', 'placeholder' => 'dd-mm-jjjj')) }}
        	</div>
        </div>
        @include('shapeshifter::layouts.helptext')
    </div>
</div>
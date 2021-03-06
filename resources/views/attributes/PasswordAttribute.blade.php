<label class="form-group js-placeholder" for="{{$name}}">
    <span class="form-group-content">
        <span class="form-label">
            {{ $label }}
        </span>
        <span class="form-field">
            <span class="form-control form-field-medium">
                <span class="module-1">
            	   {!! Form::password($name, array('class' => 'form-field-content' . ($required?' js-required':''), 'id' => $name)) !!}
                </span>
            	<span class="form-group-highlight"></span>
            </span>
            @include('shapeshifter::layouts.helptext')
        </span>
    </span>
</label>


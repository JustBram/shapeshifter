<label class="form-group js-placeholder" for="{{$name}}">
    <span class="form-group-content">
        <span class="form-label">
            {{ $label }}
        </span>
        <span class="form-field">
            <span class="form-control">
                {!! Form::textarea($name, null, array('rows' => $rows, 'cols' => $cols, 'class' => 'form-field-content' . ($required?' js-required':''), 'id' => $name))  !!}
                <span class="form-group-highlight"></span>
            </span>
            @include('shapeshifter::layouts.helptext')
        </span>
    </span>
</label>

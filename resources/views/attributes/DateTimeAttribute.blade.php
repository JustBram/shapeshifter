<style>
    .datepicker input {
        width: 40%;
    }
    .datepicker .btn {
        border: 1px solid #dadada;
        border-left: none;
        font-size:1.125em;
        padding: 0.7em 0.8em;
    }
</style>

<div class="form-group" for="{{$name}}">
    <span class="form-group-content">
        <label for="" class="form-label">
            {{ $label }}
        </label>
        <span class="form-field">

            <p class="datepicker input-group" id="datepicker-{{ $name }}" data-wrap="true" data-clickOpens="false" data-enableTime="true" data-defaultDate="{{ date('H:i:s') }}" data-defaultHour="{{ date('H') }}" data-defaultMinute="{{ date('m') }}">

                <input placeholder="{{ date('d-m-Y H:i') }}"
                       value="{{ $model->{$name} }}"
                       name="{{ $name }}"
                       class="{{ ($required ? ' js-required':'') }}"
                       id="{{ $name }}"
                       autocorrect="off"
                       data-input><!--
                --><a class="btn" data-toggle><i class="fa fa-calendar"></i></a><!--
                --><a class="btn" data-clear><i class="fa fa-close"></i> </a>

            </p>

        </span>
    </span>
</div>

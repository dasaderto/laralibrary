@if( isset($values) )
    @foreach($values->toArray() as $value)
    <div class="custom-control custom-checkbox custom-control-inline">
        <input class="custom-control-input form-check-input{{ $errors->has($name) ? ' is-invalid' : '' }}" 
            id="{{ $name }}_{{ $value[$value_id ?? 'id'] }}" type="checkbox" name="{{ $name }}[]" value="{{ $value[$value_id ?? 'id'] }}"
            @if( in_array($value[$value_id ?? 'id'], old($name, $saved_value ?? []) ) ) checked @endif
        >
        <label class="custom-control-label form-check-label" for="{{ $name }}_{{ $value[$value_id ?? 'id'] }}">{{ $value[$value_name ?? 'name'] }}</label>
    </div>
    @endforeach
@elseif( isset($value) )
    <div class="custom-control custom-checkbox custom-control-inline">
        <input class="custom-control-input form-check-input" 
               id="{{ $name }}" type="checkbox" name="{{ $name }}" value="{{ $value }}" 
               @if( old($name, $saved_value ?? '') == $value ) checked @endif
        >
        <label class="custom-control-label form-check-label" for="{{ $name }}">{{ $label ?? 'Есть' }}</label>
    </div>
@endif
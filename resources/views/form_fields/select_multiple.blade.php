<select name="{{$name}}[]" multiple class="custom-select{{ $errors->has($name) ? ' is-invalid' : '' }}">
    <option value=""></option>
    @foreach($values as $value)
    <option @if( in_array( $value->{$value_id ?? 'id'}, old($name, $saved_value ?? []) ) ) selected @endif value="{{$value->{$value_id ?? 'id'} }}">{{$value->{$value_name ?? 'name'} }}</option>
    @endforeach
</select>
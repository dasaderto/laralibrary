<select name="{{$name}}" class="custom-select form-control{{ $errors->has($name) ? ' is-invalid' : '' }}">
    <option selected value="">{{ $first_title ?? '' }}</option>
    @foreach($values as $value)
    <option @if( (int)old($name, $saved_value ?? null) === $value->{$value_id ?? 'id'} ) selected @endif value="{{$value->{$value_id ?? 'id'} }}">{{$value->{$value_name ?? 'name'} }}</option>
    @endforeach
</select>
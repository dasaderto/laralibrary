<input
        list="{{ $list }}"
        name='{{ $name }}'
        class="form-control {{ $class ?? '' }}{{ $errors->has($name) ? ' is-invalid' : '' }}"
        placeholder="{{ $placeholder ?? '' }}"
        {{ $required ?? 'required' }}
        autocomplete="{{ $autocomplete }}"
        value="{{ old($name) ?? $value ?? '' }}">
<datalist id='{{ $id }}'>
    @if($data)
        @foreach($values as $value)
            <option value="{{ $value->$data }}"></option>
        @endforeach
    @else
        @for($i = 0; $i < count($values); $i++)
            <option value="{{ $values[$i] }}"></option>
        @endfor
    @endif
</datalist>
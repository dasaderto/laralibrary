<input type="text"
       name="{{ $name }}"
       value="{{ old($name, $value) }}"
       {{ $attributes ?? '' }}
       class="form-control {{ $classes ?? '' }}{{ $errors->has($name) ? ' is-invalid' : '' }}"
       placeholder = "{{ $placeholder }}"
       id = {{ $id ?? '' }}
       {{ $required ?? 'required' }}
       {{ $autocomplete ?? 'autocomplete = '.$autocomplete }}
       >
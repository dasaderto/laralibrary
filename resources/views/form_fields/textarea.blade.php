<textarea
        name="{{ $name }}"
        class="form-control {{ $classes ?? '' }}"
        rows="5"
        placeholder="{{ $placeholder ?? '' }}">{{ old($name) ?? $value ?? '' }}
</textarea>


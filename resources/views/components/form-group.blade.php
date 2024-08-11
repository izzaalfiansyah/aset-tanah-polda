<div class="form-group">
    @if (isset($label))
        <label for="" class="form-label {{ isset($required) ? 'required' : '' }}">{{ $label }}</label>
    @endif

    {{ $slot }}

    @if (isset($name))
        @error($name)
            <div class="invalid-feedback" style="display: block">{{ $message }}</div>
        @enderror
    @endif
</div>

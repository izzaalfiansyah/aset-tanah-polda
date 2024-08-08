<div class="form-group">
    @if (isset($label))
        <label for="" class="form-label {{ isset($required) ? 'required' : '' }}">{{ $label }}</label>
    @endif

    {{ $slot }}

    @error($name)
        <div class="invalid-feedback" style="display: block">{{ $message }}</div>
    @enderror
</div>

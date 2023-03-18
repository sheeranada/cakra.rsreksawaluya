<div>
    <div class="form-group row mb-3">
        <label for="{{ $name }}" class="col-sm-2 col-form-label">{{ $label }}</label>
        <div class="col-sm-10">
            <select name="{{ $name }}" id="{{ $name }}" class="form-control" required>
                {{ $slot }}
            </select>
        </div>
    </div>
</div>

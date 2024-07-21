@php
    $inputName = $name ?? '';
    $inputType = $type ?? 'text';
    $inputClass = $class ?? 'form-control';
    $inputPld = $placeholder ?? '';
    $default = $default ?? '';
    $required = $required ?? false;
    $model = $model ?? null;

    $valInput = \App\Helpers\Common::getValInput($model, $inputName);
    if ($inputType === 'password') {
        $valInput = '';
    }

    if (empty($valInput) && isset($default)) {
        $valInput = $default;
    }
@endphp

<div class="input-form">
    @if ($inputType === 'password')
        <div class="div-password">
    @endif
    <input type="{{ $inputType }}" name="{{ $inputName }}" class="{{ $inputClass }}" value="{{ $valInput }}"
        placeholder="{{ $inputPld }}" {{ $required ? 'required' : '' }}>
    @if ($inputType === 'password')
        <i data-lucide="eye" class="block mx-auto eye"></i>
        <i data-lucide="eye-off" class="block mx-auto eye-off d-none"></i>
        </div>
    @endif
    @if ($errors->first($inputName))
        <div class="error error-be">{{ $errors->first($inputName) }}</div>
    @endif
</div>

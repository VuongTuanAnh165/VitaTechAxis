@php
    $action = $action ?? '';
    $placeholder = $placeholder ?? '';
    $name = $name ?? '';
    $value = request()->has($name) ? request()->input($name) : '';
@endphp

<form action="{{ $action }}" method="GET">
    <input type="text" name="{{ $name }}" value="{{ $value }}" class="form-control w-56 box pr-10" placeholder="{{ $placeholder }}">
    <button type="submit" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0">
        <i class="w-4 h-4 absolute my-auto inset-y-0 right-0" data-lucide="search"></i>
    </button>
</form>

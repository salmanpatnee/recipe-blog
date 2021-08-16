@props(['currentModel' => '', 'label' => 'Categories'])
<button {{ $attributes->merge(['class' => 'py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 flex lg:inline-flex']) }}
    }>
    {{ isset($currentModel) ? $currentModel->name : $label }}
    <x-dropdown-icon class="absolute pointer-events-none" style="right: 12px;" />
</button>

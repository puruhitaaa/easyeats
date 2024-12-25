@props(['on'])

<div x-data="{ shown: false, timeout: null }"
    x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); })"
    x-show="shown"
    x-transition
    x-cloak
    {{ $attributes->merge(['class' => 'text-sm text-gray-600']) }}>
    {{ $slot->isEmpty() ? 'Saved.' : $slot }}
</div>

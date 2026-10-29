
@props(['disabled' => false])

<input
    @disabled($disabled)
    {{ $attributes->merge([
        'class' => 'block w-full rounded-md border border-gray-600 bg-[#191C20] px-3 py-2 text-sm text-[#F5F6F1] shadow-sm focus:border-lime-300 focus:outline-none focus:ring-1 focus:ring-lime-300'
    ]) }}
>

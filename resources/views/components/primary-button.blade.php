
<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex items-center justify-center rounded-md bg-lime-300 px-4 py-2 text-xs font-bold uppercase tracking-widest text-gray-900 transition hover:bg-lime-200 focus:outline-none focus:ring-2 focus:ring-lime-300'
    ]) }}
>
    {{ $slot }}
</button>

@props(['disabled' => false])

<button {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-[#3D9970] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#2E7353] focus:bg-[#2E7353] active:bg-[#2E7353] focus:outline-none focus:ring-2 focus:ring-[#3D9970] focus:ring-offset-2 transition ease-in-out duration-150']) !!}>
    {{ $slot }}
</button>

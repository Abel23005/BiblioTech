@props(['disabled' => false])

<button {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-[#D4AF37] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#B38F2E] focus:bg-[#B38F2E] active:bg-[#B38F2E] focus:outline-none focus:ring-2 focus:ring-[#D4AF37] focus:ring-offset-2 transition ease-in-out duration-150']) !!}>
    {{ $slot }}
</button>

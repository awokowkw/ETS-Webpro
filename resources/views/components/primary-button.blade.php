<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gradient-to-r from-[#ADD8E6] to-[#66c8e8] text-black border border-transparent rounded-md font-semibold text-sm tracking-wider hover:opacity-95 focus:outline-none focus:ring-2 focus:ring-[#66c8e8] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

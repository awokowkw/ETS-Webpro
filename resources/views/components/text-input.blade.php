@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'bg-black text-white border-[#66c8e8]/20 focus:border-[#66c8e8] focus:ring-[#66c8e8] rounded-md shadow-sm placeholder-gray-400']) }}>

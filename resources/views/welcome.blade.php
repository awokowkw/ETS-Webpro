<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ChessCourse Academy</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Overlay blur to darken video */
        .overlay {
            background: rgba(0, 0, 0, 0.55);
            backdrop-filter: blur(2px);
        }
        /* Smooth fade-in animation */
        .fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="antialiased text-white font-sans relative">

    <div class="absolute inset-0 -z-10 overflow-hidden">
        <video autoplay muted loop playsinline class="w-full h-full object-cover"> 
            <source src="{{ asset('video/BG-Video.mp4') }}" type="video/mp4">
            <img src="{{ asset('image/BG_Welcome.jpg') }}" alt="Chess Academy Background" class="w-full h-full object-cover">
        </video>
        <div class="absolute inset-0 overlay"></div>
    </div>

    <header class="flex justify-between items-center px-10 py-6 absolute top-0 w-full z-20">
        <div class="flex items-center gap-3">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-20 h-20">
            <h1 class="text-2xl font-bold tracking-wide">ChessCourse</h1>
        </div>

        <div>
            <a href="{{ route('login') }}" 
               class="px-5 py-2 border border-[#ADD8E6] rounded-md hover:bg-[#ADD8E6] hover:text-black transition text-sm font-semibold">
               Login
            </a>
        </div>
    </header>

    {{-- 🔹 Hero Section --}}
    <section class="flex flex-col justify-center items-center h-screen text-center fade-in px-6">
        <div class="max-w-3xl">
            <h2 class="text-4xl md:text-6xl font-extrabold tracking-wide mb-3">
                Born as a <span class="text-[#ADD8E6]">Pawn</span>, Rise as a <span class="text-[#ADD8E6]">Queen</span>
            </h2>
            <br><br>
            <p class="text-lg md:text-xl text-gray-200 font-light mb-6">
                Still learning chess the old-fashioned way? Here you can learn chess integrated with the world of technology.</p>
            
            <br>
            <div class="flex justify-center gap-4">
                    <a href="{{ route('register') }}" 
                       class="bg-[#ADD8E6] text-black font-semibold px-6 py-3 rounded-md shadow-lg hover:opacity-95 transition duration-200">
                        Join Us
                    </a>
                </div>
        </div>
    </section>

    {{-- 🔹 Footer --}}
    <footer class="absolute bottom-0 left-0 right-0 text-center py-3 text-gray-400 text-sm bg-black/30 backdrop-blur-sm">
        © {{ date('Y') }} ChessCourse Academy
    </footer>

</body>
</html>

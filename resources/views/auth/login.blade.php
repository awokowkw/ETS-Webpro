<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <div class="relative">
            <x-input-label for="password" :value="__('Password')" />

            <input id="password" type="password"
                name="password"
                required autocomplete="current-password"
                class="block mt-1 w-full border-gray-300 text-black rounded-lg shadow-sm focus:ring-[#66c8e8] focus:border-[#66c8e8] pr-10">

            <button type="button" onclick="togglePassword()" 
                class="absolute inset-y-0 right-2 top-5 flex items-center text-gray-500 hover:text-[#66c8e8]">
                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" 
                    class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </button>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-[#66c8e8]/100 text-[#66c8e8] bg-black shadow-sm focus:ring-[#66c8e8]" name="remember">
                <span class="ms-2 text-sm text-white">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col items-center mt-6 space-y-3">
            <div class="flex justify-between w-full items-center">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-white hover:text-[#66c8e8] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#66c8e8]"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>

            <p class="text-sm text-gray-300">
                {{ __("Don't have an account?") }}
                <a href="{{ route('register') }}"
                   class="font-semibold text-[#66c8e8] hover:underline hover:text-[#82d9f4] transition">
                    {{ __('Register here') }}
                </a>
            </p>
        </div>
    </form>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 012.042-3.343M9.88 9.88a3 3 0 014.24 4.24m-4.24-4.24L4.22 4.22m0 0l15.56 15.56" />`;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
            }
        }
    </script>

</x-guest-layout>

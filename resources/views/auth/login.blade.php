<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="w-full sm:max-w-md px-8 py-8 bg-white/90 backdrop-blur-sm shadow-xl rounded-2xl">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    {{ __('Selamat Datang') }}
                </h2>
                <p class="text-gray-600 mt-3 text-lg">{{ __('Silakan masuk ke akun Anda') }}</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div class="space-y-2">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 text-lg" />
                    <x-text-input id="email" 
                        class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:border-purple-500 focus:ring focus:ring-purple-200 transition duration-200 ease-in-out"
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autofocus 
                        autocomplete="username" 
                        placeholder="nama@email.com"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 text-lg" />
                    <x-text-input id="password" 
                        class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:border-purple-500 focus:ring focus:ring-purple-200 transition duration-200 ease-in-out"
                        type="password"
                        name="password"
                        required 
                        autocomplete="current-password"
                        placeholder="••••••••"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded-md border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500" name="remember">
                        <span class="ms-2 text-gray-600">{{ __('Ingat Saya') }}</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="text-sm text-purple-600 hover:text-purple-800 font-semibold transition duration-150 ease-in-out" href="{{ route('password.request') }}">
                            {{ __('Lupa Password?') }}
                        </a>
                    @endif
                </div>

                <div>
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-3 px-4 rounded-xl font-semibold text-lg hover:opacity-90 transform hover:scale-[1.02] transition-all duration-200">
                        {{ __('Masuk') }}
                    </button>
                </div>
            </form>

            {{-- <div class="mt-8 text-center">
                <p class="text-gray-600">
                    {{ __('Belum punya akun?') }}
                    <a href="{{ route('register') }}" class="font-semibold text-purple-600 hover:text-purple-800 transition duration-150 ease-in-out">
                        {{ __('Daftar Sekarang') }}
                    </a>
                </p>
            </div> --}}
        </div>
    </div>
</x-guest-layout>

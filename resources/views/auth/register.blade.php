<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="w-full sm:max-w-md px-8 py-8 bg-white/90 backdrop-blur-sm shadow-xl rounded-2xl">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    {{ __('Buat Akun Baru') }}
                </h2>
                <p class="text-gray-600 mt-3 text-lg">{{ __('Silakan lengkapi data diri Anda') }}</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div class="space-y-2">
                    <x-input-label for="name" :value="__('Nama Lengkap')" class="text-gray-700 text-lg" />
                    <x-text-input id="name" 
                        class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:border-purple-500 focus:ring focus:ring-purple-200 transition duration-200 ease-in-out"
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        required 
                        autofocus 
                        autocomplete="name"
                        placeholder="Masukkan nama lengkap"
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="space-y-2">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 text-lg" />
                    <x-text-input id="email" 
                        class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:border-purple-500 focus:ring focus:ring-purple-200 transition duration-200 ease-in-out"
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
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
                        autocomplete="new-password"
                        placeholder="Minimal 8 karakter"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="space-y-2">
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-gray-700 text-lg" />
                    <x-text-input id="password_confirmation" 
                        class="block w-full px-4 py-3 rounded-xl border-gray-200 focus:border-purple-500 focus:ring focus:ring-purple-200 transition duration-200 ease-in-out"
                        type="password"
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password"
                        placeholder="Ulangi password"
                    />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div>
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-3 px-4 rounded-xl font-semibold text-lg hover:opacity-90 transform hover:scale-[1.02] transition-all duration-200">
                        {{ __('Daftar Sekarang') }}
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-gray-600">
                    {{ __('Sudah punya akun?') }}
                    <a href="{{ route('login') }}" class="font-semibold text-purple-600 hover:text-purple-800 transition duration-150 ease-in-out">
                        {{ __('Masuk') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>

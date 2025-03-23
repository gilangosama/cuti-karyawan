<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 fw-semibold mb-0">Tambah Karyawan Baru</h2>
            <a href="{{ route('hrd.index') }}" class="btn btn-light btn-sm">Kembali</a>
        </div>
    </x-slot>

    <div class="container-fluid py-4">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body">
                <form method="POST" action="{{ route('hrd.store') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <x-input-label for="name" :value="__('Nama Lengkap')" class="form-label" />
                        <x-text-input id="name" class="form-control" type="text" name="name"
                            :value="old('name')" required autofocus autocomplete="name"
                            placeholder="Masukkan nama lengkap" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" class="form-label" />
                        <x-text-input id="email" class="form-control" type="email" name="email"
                            :value="old('email')" required autocomplete="username" placeholder="nama@email.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Role -->
                    <div class="mb-3">
                        <x-input-label for="role" :value="__('Role')" class="form-label" />
                        <select name="role" id="role" class="form-select">
                            <option value="user">User</option>
                            <option value="Approval">Approval</option>
                            <option value="hrd">HRD</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Password')" class="form-label" />
                        <x-text-input id="password" class="form-control" type="password" name="password" required
                            autocomplete="new-password" placeholder="Minimal 8 karakter" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="form-label" />
                        <x-text-input id="password_confirmation" class="form-control" type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Ulangi password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-100">
                            {{ __('Tambah User') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

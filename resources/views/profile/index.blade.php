<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl">
                <div class="p-6">
                    @if(!auth()->user()->is_profile_completed)
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                    Silakan lengkapi data profile Anda terlebih dahulu
                                </p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Profile Header -->
                        <div class="flex flex-col md:flex-row items-center md:items-start gap-6 pb-6 border-b">
                            <!-- Avatar -->
                            <div class="relative">
                                <div class="w-32 h-32 rounded-full bg-purple-100 flex items-center justify-center">
                                    <span class="text-4xl font-bold text-purple-600">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                                <button type="button" class="absolute bottom-0 right-0 p-2 bg-white rounded-full shadow-lg border hover:bg-gray-50">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </button>
                            </div>

                            <!-- Info -->
                            <div class="flex-1">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                        <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                        <input type="email" value="{{ Auth::user()->email }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Pribadi -->
                        <div class="border-b pb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Pribadi</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
                                    <input type="text" name="nik" value="{{ old('nik', Auth::user()->nik) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                                    <input type="tel" name="phone" value="{{ old('phone', Auth::user()->phone) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                                    <input type="text" name="birth_place" value="{{ old('birth_place', Auth::user()->birth_place) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                                    <input type="date" name="birth_date" value="{{ old('birth_date', Auth::user()->birth_date) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500" required>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                    <textarea name="address" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500" required>{{ old('address', Auth::user()->address) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Pekerjaan -->
                        <div class="border-b pb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Pekerjaan</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Badge</label>
                                    <input type="text" name="badge_number" value="{{ old('badge_number', Auth::user()->badge_number) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Bergabung</label>
                                    <input type="date" name="join_date" value="{{ old('join_date', Auth::user()->join_date) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Section</label>
                                    <select name="department" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500" required>
                                        <option value="">Pilih Section</option>
                                        @foreach(['IT', 'HR', 'Finance', 'Production'] as $dept)
                                            <option value="{{ $dept }}" {{ old('department', Auth::user()->department) == $dept ? 'selected' : '' }}>
                                                {{ $dept }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Position</label>
                                    <input type="text" name="position" value="{{ old('position', Auth::user()->position) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Status Kerja</label>
                                    <select name="work_status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500" required>
                                        <option value="">Pilih Status</option>
                                        @foreach(['Shift', 'Non-Shift'] as $status)
                                            <option value="{{ $status }}" {{ old('work_status', Auth::user()->work_status) == $status ? 'selected' : '' }}>
                                                {{ $status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Setelah Status Kerja, tambahkan section baru -->
                        <div class="mt-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Approval</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Approval 1 -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Approval 1</label>
                                    <select name="approval_1" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500">
                                        <option value="">Pilih Approval 1</option>
                                        <option value="approval_1">Alex</option>
                                        <option value="approval_2">Alex</option>
                                        <option value="approval_3">jack</option>
                                        <option value="approval_4">dudu</option>
                                    </select>
                                </div>

                                <!-- Approval 2 -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Approval 2</label>
                                    <select name="approval_2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-purple-500">
                                        <option value="">Pilih Approval 2</option>
                                        <option value="approval_1">Alex</option>
                                        <option value="approval_2">Alex</option>
                                        <option value="approval_3">jack</option>
                                        <option value="approval_4">dudu</option>
                                    </select>
                            </div>
                        </div>

                        <!-- Tombol Simpan di bagian bawah -->
                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="px-6 py-2.5 bg-purple-600 text-white rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 text-sm font-medium">
                                Simpan Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 
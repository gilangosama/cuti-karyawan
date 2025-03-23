<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Karyawan Baru') }}
            </h2>
            <a href="{{ route('hrd.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 text-sm font-medium">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl">
                <form action="" method="POST" class="p-6">
                    @csrf
                    <!-- Informasi Pribadi -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Pribadi</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Badge ID</label>
                                <input type="text" name="badge_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                                <input type="tel" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500">
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Pekerjaan -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Pekerjaan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Departemen</label>
                                <select name="department" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500" required>
                                    <option value="">Pilih Departemen</option>
                                    <option value="IT">IT</option>
                                    <option value="HR">HR</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Marketing">Marketing</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                                <input type="text" name="position" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Bergabung</label>
                                <input type="date" name="join_date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Status Karyawan</label>
                                <select name="employment_status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500" required>
                                    <option value="">Pilih Status</option>
                                    <option value="permanent">Karyawan Tetap</option>
                                    <option value="contract">Karyawan Kontrak</option>
                                    <option value="probation">Masa Percobaan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Approval Settings -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Pengaturan Approval</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Approval 1</label>
                                <select name="approval_1" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500" required>
                                    <option value="">Pilih Approval 1</option>
                                    <option value="supervisor_1">Supervisor 1</option>
                                    <option value="manager_1">Manager 1</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Approval 2</label>
                                <select name="approval_2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500" required>
                                    <option value="">Pilih Approval 2</option>
                                    <option value="manager_1">Manager 1</option>
                                    <option value="director_1">Director 1</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Password Akun</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500" required>
                                <p class="mt-1 text-xs text-gray-500">Minimal 8 karakter</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500" required>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2.5 bg-purple-600 text-white rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 text-sm font-medium">
                            Tambah Karyawan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 
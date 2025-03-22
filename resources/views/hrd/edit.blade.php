<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Data Karyawan') }}
            </h2>
            <a href="{{ route('hrd.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 text-sm font-medium">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Informasi Pribadi -->
                    <div class="p-6 border-b">
                        <h3 class="text-lg font-medium text-purple-600 mb-6 bg-purple-50 p-3 rounded-lg">
                            Informasi Pribadi
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Lengkap
                                </label>
                                <input type="text" name="name" value="" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 focus:border-purple-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Email
                                </label>
                                <input type="email" name="email" value=""
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 focus:border-purple-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Badge ID
                                </label>
                                <input type="text" name="badge_id" value=""
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 focus:border-purple-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Nomor Telepon
                                </label>
                                <input type="tel" name="phone" value=""
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 focus:border-purple-500">
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Pekerjaan -->
                    <div class="p-6 border-b">
                        <h3 class="text-lg font-medium text-purple-600 mb-6 bg-purple-50 p-3 rounded-lg">
                            Informasi Pekerjaan
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Departemen
                                </label>
                                <select name="department" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 focus:border-purple-500">
                                    <option value="">Pilih Departemen</option>
                                    <option value="IT">IT</option>
                                    <option value="HR">HR</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Marketing">Marketing</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Jabatan
                                </label>
                                <input type="text" name="position" value=""
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 focus:border-purple-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Tanggal Bergabung
                                </label>
                                <input type="date" name="join_date" value=""
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 focus:border-purple-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Status Karyawan
                                </label>
                                <select name="employment_status" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 focus:border-purple-500">
                                    <option value="">Pilih Status</option>
                                    <option value="permanent" >Karyawan Tetap</option>
                                    <option value="contract">Karyawan Kontrak</option>
                                    <option value="probation">Masa Percobaan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Pengaturan Approval -->
                    <div class="p-6 border-b">
                        <h3 class="text-lg font-medium text-purple-600 mb-6 bg-purple-50 p-3 rounded-lg">
                            Pengaturan Approval
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Approval 1
                                </label>
                                <select name="approval_1" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 focus:border-purple-500">
                                    <option value="">Pilih Approval 1</option>
                                    <option value="supervisor_1">Supervisor 1</option>
                                    <option value="manager_1">Manager 1</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Approval 2
                                </label>
                                <select name="approval_2" 
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 focus:border-purple-500">
                                    <option value="">Pilih Approval 2</option>
                                    <option value="manager_1">Manager 1</option>
                                    <option value="director_1">Director 1</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="p-6 flex justify-end">
                        <button type="submit" 
                            class="px-6 py-2.5 bg-purple-600 text-white rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endpush
</x-app-layout> 
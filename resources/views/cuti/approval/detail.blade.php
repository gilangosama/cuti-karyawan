<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Pengajuan Cuti') }}
            </h2>
            <a href="{{ route('cuti.approval.index') }}" class="px-4 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl rounded-xl">
                <div class="p-6">
                    <!-- Informasi Karyawan -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Karyawan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Nama Karyawan</label>
                                <p class="mt-1 text-sm text-gray-900" id="nama"></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Departemen</label>
                                <p class="mt-1 text-sm text-gray-900" id="departemen"></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jabatan</label>
                                <p class="mt-1 text-sm text-gray-900"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Cuti -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Cuti</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jenis Cuti</label>
                                <p class="mt-1 text-sm text-gray-900" id="jenisCuti"></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Tanggal Cuti</label>
                                <p class="mt-1 text-sm text-gray-900" id="tanggalCuti">
                                    
                                </p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Durasi</label>
                                <p class="mt-1 text-sm text-gray-900" id="durasi">Hari</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Alamat Selama Cuti</label>
                                <p class="mt-1 text-sm text-gray-900" id="alamat"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Dokumen Pendukung -->
                    <div class="mb-8">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Dokumen Pendukung</h3>
                        <div class="border border-gray-200 rounded-lg p-4">
                            <a href="" target="_blank" class="text-purple-600 hover:text-purple-900">
                                <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z" />
                                </svg>
                                Lihat Surat Dokter
                            </a>
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-end space-x-4">
                        <button onclick="rejectLeave()" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            Tolak
                        </button>
                        <button onclick="approveLeave()" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                            Setujui
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function approveLeave() {
            if (confirm('Apakah Anda yakin ingin menyetujui cuti ini?')) {
                alert('Cuti berhasil disetujui');
                window.location.href = "{{ route('cuti.approval.index') }}";
            }
        }

        function rejectLeave() {
            if (confirm('Apakah Anda yakin ingin menolak cuti ini?')) {
                alert('Cuti berhasil ditolak');
                window.location.href = "{{ route('cuti.approval.index') }}";
            }
        }
    </script>
    @endpush
</x-app-layout>

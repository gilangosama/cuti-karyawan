<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Data Cuti') }}
        </h2>
    </x-slot>

    @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif
    @if (session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
        <p>{{ session('error') }}</p>
    </div>
    @endif
        

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tabel Data -->
            <div class="bg-white overflow-hidden shadow-sm rounded-xl">
                <div class="p-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Registrasi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pengajuan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Cuti</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Periode Cuti</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durasi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">REG/2024/001</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">20 Mar 2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Cuti Tahunan</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">22 Mar 2024 - 24 Mar 2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3 Hari</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        Menunggu Persetujuan
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4 flex items-center justify-between">
                        <div class="text-sm text-gray-700">
                            Showing 1 to 10 of 20 results
                        </div>
                        <div class="flex gap-2">
                            <button class="px-3 py-1 border rounded-lg text-sm">Previous</button>
                            <button class="px-3 py-1 bg-purple-50 border border-purple-500 rounded-lg text-sm">1</button>
                            <button class="px-3 py-1 border rounded-lg text-sm">2</button>
                            <button class="px-3 py-1 border rounded-lg text-sm">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Approval HRD - Surat Cuti') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filter Section -->
            <div class="bg-white rounded-xl shadow-md p-6 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500">
                            <option value="">Semua Status</option>
                            <option value="pending">Menunggu</option>
                            <option value="approved">Disetujui</option>
                            <option value="rejected">Ditolak</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Cuti</label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500">
                            <option value="">Semua Jenis</option>
                            <option value="annual">Cuti Tahunan</option>
                            <option value="sick">Cuti Sakit</option>
                            <option value="important">Cuti Penting</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pencarian</label>
                        <input type="text" placeholder="Cari nama karyawan" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500">
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="bg-white overflow-hidden shadow-xl rounded-xl">
                <div class="p-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Karyawan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Cuti</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Cuti</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durasi</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                                                <span class="text-sm font-medium text-purple-600">JD</span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">John Doe</div>
                                            <div class="text-sm text-gray-500">IT Department</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Cuti Tahunan</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">20/03/2024 - 22/03/2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3 Hari</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <a href="{{ route('cuti.approval.detail', 1) }}" class="text-purple-600 hover:text-purple-900">Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                                                <span class="text-sm font-medium text-purple-600">JS</span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Jane Smith</div>
                                            <div class="text-sm text-gray-500">HR Department</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Cuti Sakit</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">25/03/2024 - 26/03/2024</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2 Hari</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Disetujui</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button onclick="showDetail(2)" class="text-purple-600 hover:text-purple-900">Detail</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</x-app-layout> 
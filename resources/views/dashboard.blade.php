<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Form Pengajuan Cuti') }}
            </h2>
            <span class="text-sm text-gray-600">Sisa Cuti Tahunan: <span class="font-bold text-purple-600">12 Hari</span></span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-400 bg-opacity-30 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">Cuti Diambil</h3>
                            <p class="text-2xl font-bold">3 Hari</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-400 bg-opacity-30 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">Pengajuan</h3>
                            <p class="text-2xl font-bold">2 Pending</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-400 bg-opacity-30 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">Disetujui</h3>
                            <p class="text-2xl font-bold">5 Cuti</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg p-6 text-white">
                    <div class="flex items-center">
                        <div class="p-3 bg-red-400 bg-opacity-30 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold">Ditolak</h3>
                            <p class="text-2xl font-bold">1 Cuti</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Riwayat Pengajuan Cuti -->
            <div class="bg-white overflow-hidden shadow-xl rounded-xl mb-6">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-gray-800">{{ __("Riwayat Pengajuan Cuti") }}</h3>
                        <div class="flex space-x-2">
                            <select class="rounded-lg border-gray-300 text-sm focus:ring-purple-500 focus:border-purple-500">
                                <option>Semua Status</option>
                                <option>Pending</option>
                                <option>Disetujui</option>
                                <option>Ditolak</option>
                            </select>
                            <input type="month" class="rounded-lg border-gray-300 text-sm focus:ring-purple-500 focus:border-purple-500">
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Cuti</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durasi</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Cuti Tahunan</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">20 Mar 2024 - 22 Mar 2024</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">3 Hari</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <button class="text-blue-600 hover:text-blue-900">Detail</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Form Surat Cuti -->
            <div class="bg-white overflow-hidden shadow-xl rounded-xl">
                <div class="p-6">
                    <!-- Header Surat -->
                    <div class="text-center mb-6">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo KMI" class="h-20 mx-auto mb-2">
                        <h2 class="text-xl font-bold">PT. Kaltim Methanol Industri</h2>
                        <h3 class="text-lg font-bold mt-4">LEAVE FORM</h3>
                    </div>

                    <!-- Nomor Dokumen -->
                    <div class="grid grid-cols-3 text-sm border-b border-gray-200 pb-2 mb-6">
                        <div>No. Document: SMT.FM.PSL-01-02</div>
                        <div>TGL. 01 Agustus 2011</div>
                        <div class="text-right">Rev.: 01 Hal.: 1 dari 1</div>
                    </div>
                    
                    <form method="POST" action="" class="space-y-6">
                        @csrf
                        
                        <!-- Nomor Registrasi -->
                        <div class="mb-6">
                            <p>Registration Number: <span class="font-semibold">/Personnel-KMI/X/2024</span></p>
                        </div>

                        <!-- Data Karyawan -->
                        <div class="grid grid-cols-2 gap-x-8 gap-y-4">
                            <div class="flex">
                                <label class="w-32">Name</label>
                                <span class="px-2">:</span>
                                <x-text-input type="text" name="name" class="flex-1" required />
                            </div>
                            <div class="flex">
                                <label class="w-32">Leave Period</label>
                                <span class="px-2">:</span>
                                <x-text-input type="text" name="period" class="flex-1" value="2024/2025" required />
                            </div>
                            <div class="flex">
                                <label class="w-32">Badge No.</label>
                                <span class="px-2">:</span>
                                <x-text-input type="text" name="badge_no" class="flex-1" required />
                            </div>
                            <div class="flex">
                                <label class="w-32">Join Date</label>
                                <span class="px-2">:</span>
                                <x-text-input type="date" name="join_date" class="flex-1" required />
                            </div>
                            <div class="flex">
                                <label class="w-32">Position</label>
                                <span class="px-2">:</span>
                                <x-text-input type="text" name="position" class="flex-1" required />
                            </div>
                            <div class="flex">
                                <label class="w-32">Shift/Non Shift</label>
                                <span class="px-2">:</span>
                                <select name="shift_type" class="flex-1 rounded-md border-gray-300">
                                    <option value="NS">NS</option>
                                    <option value="Shift">Shift</option>
                                </select>
                            </div>
                            <div class="flex">
                                <label class="w-32">Section</label>
                                <span class="px-2">:</span>
                                <x-text-input type="text" name="section" class="flex-1" required />
                            </div>
                            <div class="flex">
                                <label class="w-32">Total Leave day(s)</label>
                                <span class="px-2">:</span>
                                <x-text-input type="number" name="total_days" class="flex-1" required />
                                <span class="ml-2">Work/Calendar Days</span>
                            </div>
                        </div>

                        <!-- Detail Cuti -->
                        <div class="mt-8">
                            <p class="font-semibold mb-4">I. Hereby I submit my leave form (Annual/Grand Leave)</p>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="flex items-center">
                                    <label class="w-32">On the date</label>
                                    <span class="px-2">:</span>
                                    <x-text-input type="date" name="start_date" class="flex-1" required />
                                </div>
                                <div class="flex items-center">
                                    <label class="w-20">until</label>
                                    <x-text-input type="date" name="end_date" class="flex-1" required />
                                </div>
                            </div>
                            <div class="flex items-center mt-4">
                                <label class="w-32">Holiday</label>
                                <span class="px-2">:</span>
                                <x-text-input type="text" name="holiday_dates" class="flex-1" placeholder="e.g., 09-10 November 2024" required />
                            </div>
                        </div>

                        <!-- Back to Duty & Address -->
                        <div class="mt-6">
                            <div class="flex items-center mb-4">
                                <label class="w-32">Back on duty</label>
                                <span class="px-2">:</span>
                                <x-text-input type="date" name="back_duty" class="flex-1" required />
                            </div>
                            <div class="flex">
                                <label class="w-32">Address on leave</label>
                                <span class="px-2">:</span>
                                <textarea name="address" rows="2" class="flex-1 rounded-md border-gray-300" required></textarea>
                            </div>
                        </div>

                        <!-- Tanda Tangan -->
                        <div class="grid grid-cols-3 gap-8 mt-8">
                            <div class="text-center">
                                <p>Propose by</p>
                                <div class="h-24 border-b border-gray-300 mb-2"></div>
                                <p class="font-semibold">Staff</p>
                            </div>
                            <div class="text-center">
                                <p>Approval I</p>
                                <div class="h-24 border-b border-gray-300 mb-2"></div>
                                <p class="font-semibold">HRD & T SM</p>
                            </div>
                            <div class="text-center">
                                <p>Approval II</p>
                                <div class="h-24 border-b border-gray-300 mb-2"></div>
                                <p class="font-semibold">HR Dept. Manager</p>
                            </div>
                        </div>

                        <!-- Personnel Remarks -->
                        <div class="mt-8">
                            <h4 class="font-semibold mb-2">Personnel Remarks:</h4>
                            <ol class="list-decimal list-inside space-y-1 text-sm">
                                <li>Remaining Leave day(s) period _____ = _____ Work days/Calendar Days</li>
                                <li>Remaining Leave day(s) _____ work day/calendar day should be finished before _____</li>
                                <li>After leave should be report to Superior and Personnel</li>
                                <li>If any delay kindly report to Personnel</li>
                            </ol>
                        </div>

                        <div class="flex justify-end mt-8">
                            <x-primary-button class="bg-blue-600 hover:bg-blue-700">
                                {{ __('Submit Leave Form') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

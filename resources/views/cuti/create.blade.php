<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Permohonan Cuti') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Pilihan Jenis Cuti -->
            <div class="bg-white overflow-hidden shadow-xl rounded-xl mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4">Pilih Jenis Cuti</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Cuti Tahunan -->
                        <div class="relative">
                            <input type="radio" name="jenis_cuti" id="cuti_tahunan" value="tahunan" class="peer hidden">
                            <label for="cuti_tahunan" class="block p-6 bg-white border-2 rounded-xl cursor-pointer transition-all peer-checked:border-purple-500 peer-checked:bg-purple-50 hover:bg-gray-50">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-semibold text-gray-800">Cuti Tahunan</h4>
                                    <svg class="w-5 h-5 text-purple-500 hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                                    </svg>
                                </div>
                                <p class="text-sm text-gray-600">Sisa cuti: <span class="font-semibold text-purple-600">12 hari</span></p>
                                <p class="text-xs text-gray-500 mt-2">Cuti reguler yang diberikan setiap tahun</p>
                            </label>
                        </div>

                        {{-- <!-- Cuti Besar -->
                        <div class="relative">
                            <input type="radio" name="jenis_cuti" id="cuti_besar" value="besar" class="peer hidden">
                            <label for="cuti_besar" class="block p-6 bg-white border-2 rounded-xl cursor-pointer transition-all peer-checked:border-purple-500 peer-checked:bg-purple-50 hover:bg-gray-50">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-semibold text-gray-800">Cuti Besar</h4>
                                    <svg class="w-5 h-5 text-purple-500 hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                                    </svg>
                                </div>
                                <p class="text-sm text-gray-600">Periode: <span class="font-semibold text-purple-600">6 tahun</span></p>
                                <p class="text-xs text-gray-500 mt-2">Cuti panjang setelah masa kerja tertentu</p>
                            </label>
                        </div> --}}

                        <!-- Cuti Sakit -->
                        <div class="relative">
                            <input type="radio" name="jenis_cuti" id="cuti_sakit" value="sakit" class="peer hidden">
                            <label for="cuti_sakit" class="block p-6 bg-white border-2 rounded-xl cursor-pointer transition-all peer-checked:border-purple-500 peer-checked:bg-purple-50 hover:bg-gray-50">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-semibold text-gray-800">Cuti Sakit</h4>
                                    <svg class="w-5 h-5 text-purple-500 hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                                    </svg>
                                </div>
                                <p class="text-sm text-gray-600">Memerlukan: <span class="font-semibold text-purple-600">Surat Dokter</span></p>
                                <p class="text-xs text-gray-500 mt-2">Cuti karena alasan kesehatan</p>
                            </label>
                        </div>

                        <!-- Cuti Melahirkan -->
                        <div class="relative">
                            <input type="radio" name="jenis_cuti" id="cuti_melahirkan" value="melahirkan" class="peer hidden">
                            <label for="cuti_melahirkan" class="block p-6 bg-white border-2 rounded-xl cursor-pointer transition-all peer-checked:border-purple-500 peer-checked:bg-purple-50 hover:bg-gray-50">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-semibold text-gray-800">Cuti Melahirkan</h4>
                                    <svg class="w-5 h-5 text-purple-500 hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                                    </svg>
                                </div>
                                <p class="text-sm text-gray-600">Durasi: <span class="font-semibold text-purple-600">3 Bulan</span></p>
                                <p class="text-xs text-gray-500 mt-2">Cuti untuk persalinan dan pemulihan</p>
                            </label>
                        </div>

                        {{-- <!-- Cuti Penting -->
                        <div class="relative">
                            <input type="radio" name="jenis_cuti" id="cuti_penting" value="penting" class="peer hidden">
                            <label for="cuti_penting" class="block p-6 bg-white border-2 rounded-xl cursor-pointer transition-all peer-checked:border-purple-500 peer-checked:bg-purple-50 hover:bg-gray-50">
                                <div class="flex items-center justify-between mb-2">
                                    <h4 class="font-semibold text-gray-800">Cuti Penting</h4>
                                    <svg class="w-5 h-5 text-purple-500 hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"></path>
                                    </svg>
                                </div>
                                <p class="text-sm text-gray-600">Maksimal: <span class="font-semibold text-purple-600">Menyesuaikan</span></p>
                                <p class="text-xs text-gray-500 mt-2">Cuti untuk keperluan penting keluarga</p>
                            </label>
                        </div> --}}
                    </div> 

                    <div class="flex justify-end mt-6">
                        <button type="button" onclick="showForm()" class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                            Lanjutkan
                        </button>
                    </div>
                </div>
            </div>

            <!-- Form Surat Cuti akan ditampilkan setelah memilih jenis cuti -->
            <div id="formCuti" class="hidden">
            <!-- Form Surat Cuti -->
            <div class="bg-white overflow-hidden shadow-xl rounded-xl">
                <div class="p-6">
                    <!-- Header Surat -->
                    <div class="text-center mb-6">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo KMI" class="h-20 mx-auto mb-2">
                        <h2 class="text-xl font-bold">PT. Kaltim Methanol Industri</h2>
                        <h3 id="jenisCutiTitle" class="text-lg font-bold mt-4">LEAVE FORM</h3>
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

                        <!-- Hidden input untuk jenis cuti -->
                        <input type="hidden" id="selectedJenisCuti" name="jenis_cuti" value="">

                        <!-- Field khusus untuk Cuti Sakit -->
                        <div id="suratDokterField" class="hidden mt-6">
                            <div class="flex items-center">
                                <label class="w-32">Surat Dokter</label>
                                <span class="px-2">:</span>
                                <div class="flex-1">
                                    <input type="file" name="surat_dokter" class="w-full" accept=".pdf,.jpg,.jpeg,.png">
                                    <p class="text-sm text-gray-500 mt-1">Upload surat keterangan dokter (PDF/JPG/PNG)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Field khusus untuk Cuti Melahirkan -->
                        <div id="suratKeteranganField" class="hidden mt-6">
                            <div class="flex items-center">
                                <label class="w-32">Surat Keterangan</label>
                                <span class="px-2">:</span>
                                <div class="flex-1">
                                    <input type="file" name="surat_keterangan" class="w-full" accept=".pdf,.jpg,.jpeg,.png">
                                    <p class="text-sm text-gray-500 mt-1">Upload surat keterangan dokter/bidan (PDF/JPG/PNG)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Field khusus untuk Cuti Penting -->
                        <div id="alasanPentingField" class="hidden mt-6">
                            <div class="flex">
                                <label class="w-32">Alasan Penting</label>
                                <span class="px-2">:</span>
                                <div class="flex-1">
                                    <textarea name="alasan_penting" rows="3" class="w-full rounded-md border-gray-300" placeholder="Jelaskan keperluan penting Anda secara detail"></textarea>
                                    <p class="text-sm text-gray-500 mt-1">Sertakan dokumen pendukung jika ada</p>
                                    <input type="file" name="dokumen_pendukung" class="mt-2" accept=".pdf,.jpg,.jpeg,.png">
                                </div>
                            </div>
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
    </div>

    <script>
        function showForm() {
            const selectedCuti = document.querySelector('input[name="jenis_cuti"]:checked');
            const formCuti = document.getElementById('formCuti');
            
            if (!selectedCuti) {
                alert('Silakan pilih jenis cuti terlebih dahulu');
                return;
            }

            // Tampilkan form
            formCuti.classList.remove('hidden');
            
            // Update judul form sesuai jenis cuti
            const jenisTitle = document.getElementById('jenisCutiTitle');
            switch(selectedCuti.value) {
                case 'tahunan':
                    jenisTitle.textContent = 'ANNUAL LEAVE FORM';
                    break;
                case 'besar':
                    jenisTitle.textContent = 'GRAND LEAVE FORM';
                    break;
                case 'sakit':
                    jenisTitle.textContent = 'SICK LEAVE FORM';
                    // Tampilkan field upload surat dokter
                    document.getElementById('suratDokterField').classList.remove('hidden');
                    break;
                case 'melahirkan':
                    jenisTitle.textContent = 'MATERNITY LEAVE FORM';
                    // Tampilkan field surat keterangan dokter/bidan
                    document.getElementById('suratKeteranganField').classList.remove('hidden');
                    break;
                case 'penting':
                    jenisTitle.textContent = 'IMPORTANT LEAVE FORM';
                    // Tampilkan field alasan kepentingan
                    document.getElementById('alasanPentingField').classList.remove('hidden');
                    break;
            }

            // Sembunyikan pilihan jenis cuti
            document.getElementById('jenisCutiSelection').classList.add('hidden');
            
            // Tambahkan tombol kembali
            const backButton = document.createElement('button');
            backButton.innerHTML = `
                <button type="button" onclick="backToSelection()" class="flex items-center text-gray-600 hover:text-gray-800 mb-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali ke Pilihan Cuti
                </button>
            `;
            formCuti.insertBefore(backButton, formCuti.firstChild);

            // Scroll ke form
            formCuti.scrollIntoView({ behavior: 'smooth' });

            // Set nilai hidden input untuk jenis cuti
            document.getElementById('selectedJenisCuti').value = selectedCuti.value;
        }

        function backToSelection() {
            // Tampilkan kembali pilihan jenis cuti
            document.getElementById('jenisCutiSelection').classList.remove('hidden');
            
            // Sembunyikan form
            const formCuti = document.getElementById('formCuti');
            formCuti.classList.add('hidden');
            
            // Reset semua field tambahan
            document.getElementById('suratDokterField').classList.add('hidden');
            document.getElementById('suratKeteranganField').classList.add('hidden');
            document.getElementById('alasanPentingField').classList.add('hidden');
            
            // Scroll ke pilihan jenis cuti
            document.getElementById('jenisCutiSelection').scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</x-app-layout> 
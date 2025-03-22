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
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <p class="text-sm text-gray-600">No. Document: SMT.FM.PSL-01-02</p>
                            <p class="text-sm text-gray-600 mt-1">TGL. 01 Agustus 2011</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-600">Rev.: 01 Hal.: 1 dari 1</p>
                        </div>
                    </div>
                    
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Nomor Registrasi -->
                        <div class="mb-6">
                            <p class="text-sm text-gray-800">Registration Number: /Personnel-KMI/X/2024</p>
                        </div>

                        <!-- Leave Info -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4 mb-6">
                            <div class="flex items-center">
                                <label class="text-sm font-medium text-gray-700 w-32">Leave Period</label>
                                <span class="text-gray-600 mx-2">:</span>
                                <select name="leave_period" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 text-sm">
                                    <option value="">Pilih Period</option>
                                    <option value="2023/2024">2023/2024</option>
                                    <option value="2024/2025">2024/2025</option>
                                    <option value="2025/2026">2025/2026</option>
                                </select>
                            </div>
                            <div class="flex items-center">
                                <label class="text-sm font-medium text-gray-700">Total Leave day(s)</label>
                                <span class="text-gray-600 mx-2">:</span>
                                <input type="number" name="total_days" class="w-32 px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 text-sm">
                                <span class="text-sm text-gray-600 ml-4">Work/Calendar Days</span>
                            </div>
                        </div>

                        <!-- Leave Form Title -->
                        <div class="mb-6">
                            <h2 class="text-sm font-medium text-gray-800">I. Hereby I submit my leave form (Annual/Grand Leave)</h2>
                        </div>

                        <!-- Date Range -->
                        <div class="flex items-center gap-4 mb-6">
                            <div class="flex items-center flex-1">
                                <label class="text-sm font-medium text-gray-700 w-24">On the date</label>
                                <span class="text-gray-600 mx-2">:</span>
                                <div class="flex-1 flex items-center gap-2">
                                    <div class="flex-1">
                                        <input type="text" name="start_date" id="start_date" placeholder="From Date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 text-sm">
                                    </div>
                                    <span class="text-sm text-gray-600">s/d</span>
                                    <div class="flex-1">
                                        <input type="text" name="end_date" id="end_date" placeholder="To Date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Holiday -->
                        <div class="flex items-center mb-6">
                            <label class="text-sm font-medium text-gray-700 w-24">Holiday</label>
                            <span class="text-gray-600 mx-2">:</span>
                            <input type="text" name="holiday" placeholder="e.g., 09-10 November 2024" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 text-sm">
                        </div>

                        <!-- Address -->
                        <div class="flex mb-6">
                            <label class="text-sm font-medium text-gray-700 w-32 pt-2">Address on leave</label>
                            <span class="text-gray-600 mx-2 pt-2">:</span>
                            <div class="flex-1">
                                <textarea name="address" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 text-sm" placeholder="Please fill out this field."></textarea>
                            </div>
                        </div>

                        <!-- File Uploads -->
                        <div id="fileUploadFields" class="space-y-4 mb-6">
                            <div class="flex items-start">
                                <label class="text-sm font-medium text-gray-700 w-32">Surat Dokter</label>
                                <span class="text-gray-600 mx-2">:</span>
                                <div class="flex-1">
                                    <input type="file" name="doctor_letter" class="block w-full text-sm text-gray-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-lg file:border-0
                                        file:text-sm file:font-medium
                                        file:bg-gray-50 file:text-gray-700
                                        hover:file:bg-gray-100">
                                    <p class="mt-1 text-sm text-gray-500">Upload surat keterangan dokter (PDF/JPG/PNG)</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <label class="text-sm font-medium text-gray-700 w-32">Surat Keterangan</label>
                                <span class="text-gray-600 mx-2">:</span>
                                <div class="flex-1">
                                    <input type="file" name="supporting_letter" class="block w-full text-sm text-gray-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-lg file:border-0
                                        file:text-sm file:font-medium
                                        file:bg-gray-50 file:text-gray-700
                                        hover:file:bg-gray-100">
                                    <p class="mt-1 text-sm text-gray-500">Upload surat keterangan dokter/bidan (PDF/JPG/PNG)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="px-6 py-2.5 bg-purple-600 text-white rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 text-sm font-medium">
                                Submit Leave Form
                            </button>
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

        // Inisialisasi datepicker untuk start_date
        const startDatePicker = flatpickr("#start_date", {
            dateFormat: "d/m/Y",
            allowInput: true,
            onChange: function(selectedDates, dateStr, instance) {
                // Update minimum date untuk end_date
                endDatePicker.set('minDate', dateStr);
            }
        });

        // Inisialisasi datepicker untuk end_date
        const endDatePicker = flatpickr("#end_date", {
            dateFormat: "d/m/Y",
            allowInput: true,
            onChange: function(selectedDates, dateStr, instance) {
                // Hitung total hari
                if (startDatePicker.selectedDates[0]) {
                    const start = startDatePicker.selectedDates[0];
                    const end = selectedDates[0];
                    const diffTime = Math.abs(end - start);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                    document.querySelector('input[name="total_days"]').value = diffDays;
                }
            }
        });

        // Generate leave period options dynamically
        function generateLeavePeriodsOptions() {
            const select = document.querySelector('select[name="leave_period"]');
            const currentYear = new Date().getFullYear();
            
            // Clear existing options except the first one
            while (select.options.length > 1) {
                select.remove(1);
            }

            // Add options for 5 years (current year - 1 to current year + 3)
            for (let i = -1; i < 4; i++) {
                const year = currentYear + i;
                const nextYear = year + 1;
                const option = new Option(`${year}/${nextYear}`, `${year}/${nextYear}`);
                select.add(option);
            }
        }

        // Call the function when page loads
        generateLeavePeriodsOptions();
    </script>
</x-app-layout> 
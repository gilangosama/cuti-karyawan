<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-semibold mb-0">Permohonan Cuti</h2>
    </x-slot>

    <div class="container-fluid py-4">
        <!-- Pilihan Jenis Cuti -->
        <div class="card border-0 shadow-sm rounded-3 mb-4">
            <div class="card-body p-4">
                <h3 class="fw-semibold mb-4">Pilih Jenis Cuti</h3>
                
                <div class="row g-4">
                    <!-- Cuti Tahunan -->
                    <div class="col-md-4">
                        <div class="position-relative">
                            <input type="radio" name="jenis_cuti" id="cuti_tahunan" value="tahunan" class="d-none">
                            <label for="cuti_tahunan" class="card h-100 border-2 cursor-pointer">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="fw-semibold mb-0">Cuti Tahunan</h5>
                                        <i class="bi bi-check-circle-fill text-purple d-none"></i>
                                    </div>
                                    <p class="text-sm mb-1">Sisa cuti: <span class="fw-semibold text-purple">12 hari</span></p>
                                    <small class="text-muted">Cuti reguler yang diberikan setiap tahun</small>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Cuti Sakit -->
                    <div class="col-md-4">
                        <div class="position-relative">
                            <input type="radio" name="jenis_cuti" id="cuti_sakit" value="sakit" class="d-none">
                            <label for="cuti_sakit" class="card h-100 border-2 cursor-pointer">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="fw-semibold mb-0">Cuti Sakit</h5>
                                        <i class="bi bi-check-circle-fill text-purple d-none"></i>
                                    </div>
                                    <p class="text-sm mb-1">Memerlukan: <span class="fw-semibold text-purple">Surat Dokter</span></p>
                                    <small class="text-muted">Cuti karena alasan kesehatan</small>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Cuti Melahirkan -->
                    <div class="col-md-4">
                        <div class="position-relative">
                            <input type="radio" name="jenis_cuti" id="cuti_melahirkan" value="melahirkan" class="d-none">
                            <label for="cuti_melahirkan" class="card h-100 border-2 cursor-pointer">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="fw-semibold mb-0">Cuti Melahirkan</h5>
                                        <i class="bi bi-check-circle-fill text-purple d-none"></i>
                                    </div>
                                    <p class="text-sm mb-1">Durasi: <span class="fw-semibold text-purple">3 Bulan</span></p>
                                    <small class="text-muted">Cuti untuk persalinan dan pemulihan</small>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="button" onclick="showForm()" class="btn btn-primary px-4" style="background-color: #7C3AED; border: none;">
                        Lanjutkan
                    </button>
                </div>
            </div>
        </div>

        <!-- Form Surat Cuti -->
        <div id="formCuti" class="d-none">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    <!-- Header Surat -->
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo KMI" class="mb-3" style="height: 80px;">
                        <h4 class="fw-bold mb-1">PT. Kaltim Methanol Industri</h4>
                        <h5 id="jenisCutiTitle" class="fw-bold mt-4">LEAVE FORM</h5>
                    </div>

                    <!-- Nomor Dokumen -->
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <small class="text-muted">No. Document: SMT.FM.PSL-01-02</small><br>
                            <small class="text-muted">TGL. 01 Agustus 2011</small>
                        </div>
                        <div class="text-end">
                            <small class="text-muted">Rev.: 01 Hal.: 1 dari 1</small>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('cuti.store') }}" id="cutiForm" data-hmin="{{ $hMinCuti }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="jenis_cuti" id="selectedJenisCuti">

                        <!-- Nomor Registrasi -->
                        <div class="mb-4">
                            <small class="text-muted">Registration Number: /Personnel-KMI/X/2024</small>
                        </div>

                            <!-- Leave Info -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4 mb-6">
                                <div class="flex items-center">
                                    <label class="text-sm font-medium text-gray-700 w-32">Leave Period</label>
                                    <span class="text-gray-600 mx-2">:</span>
                                    <input type="text" value="2024/2025"
                                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 text-sm"
                                        readonly>
                                </div>
                                <div class="flex items-center">
                                    <label class="text-sm font-medium text-gray-700">Total Leave day(s)</label>
                                    <span class="text-gray-600 mx-2">:</span>
                                    <input type="number" name="total_days"
                                        class="w-32 px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 text-sm">
                                    <span class="text-sm text-gray-600 ml-4">Work/Calendar Days</span>
                                </div>
                            </div>
                        </div>

                            <!-- Date Range -->
                            <div class="flex items-center gap-4 mb-6">
                                <div class="flex items-center flex-1">
                                    <label class="text-sm font-medium text-gray-700 w-24">On the date</label>
                                    <span class="text-gray-600 mx-2">:</span>
                                    <input type="date" name="start" placeholder="mm/dd/yyyy"
                                        id="start"
                                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 text-sm">
                                </div>
                                <div class="flex items-center flex-1">
                                    <label class="text-sm font-medium text-gray-700 w-12">until</label>
                                    <input type="date" name="end" placeholder="mm/dd/yyyy" id="end"
                                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 text-sm">
                                </div>
                            </div>

                            <!-- Holiday -->
                            <div class="flex items-center mb-6">
                                <label class="text-sm font-medium text-gray-700 w-24">Holiday</label>
                                <span class="text-gray-600 mx-2">:</span>
                                <input type="text" name="holiday" placeholder="e.g., 09-10 November 2024"
                                    class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 text-sm">
                            </div>

                            <!-- Address -->
                            <div class="flex mb-6">
                                <label class="text-sm font-medium text-gray-700 w-32 pt-2">Address on leave</label>
                                <span class="text-gray-600 mx-2 pt-2">:</span>
                                <div class="flex-1">
                                    <textarea name="address" rows="3"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-1 focus:ring-purple-500 text-sm"
                                        placeholder="Please fill out this field."></textarea>
                                </div>
                            </div>

                        <!-- Approval -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label">Approval 1</label>
                                <select name="approval_1" id="approval_1" class="form-select">
                                    @foreach ($approvals as $approval)
                                    <option value="{{ $approval->id }}">{{ $approval->name }} - {{ $approval->profil->position }}</option>
                                    @endforeach
                                </select>
                                <label for="approval_2">Approval 2</label>
                                <select name="approval_1" id="approval_2">
                                    @foreach ($approvals as $approval)
                                    <option value="{{ $approval->id }}">{{ $approval->name }} - {{ $approval->profil->position }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Personal</label>
                                <select name="personal" id="personal" class="form-select">
                                    @foreach ($hrds as $personal)
                                    <option value="{{ $personal->id }}">{{ $personal->name }} - {{ $personal->profil->position }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                            <!-- File Uploads -->
                            <div id="fileUploadFields" class="space-y-4 mb-6">
                                <div class="items-start" id="suratDokterField">
                                    <label class="text-sm font-medium text-gray-700 w-32">Surat Dokter</label>
                                    <span class="text-gray-600 mx-2">:</span>
                                    <div class="flex-1">
                                        <input type="file" name="doctor_letter"
                                            class="block w-full text-sm text-gray-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-lg file:border-0
                                        file:text-sm file:font-medium
                                        file:bg-gray-50 file:text-gray-700
                                        hover:file:bg-gray-100">
                                        <p class="mt-1 text-sm text-gray-500">Upload surat keterangan dokter
                                            (PDF/JPG/PNG)</p>
                                    </div>
                                </div>
                                <div class="items-start" id="suratKeteranganField">
                                    <label class="text-sm font-medium text-gray-700 w-32">Surat Keterangan</label>
                                    <span class="text-gray-600 mx-2">:</span>
                                    <div class="flex-1">
                                        <input type="file" name="supporting_letter"
                                            class="block w-full text-sm text-gray-500
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-lg file:border-0
                                        file:text-sm file:font-medium
                                        file:bg-gray-50 file:text-gray-700
                                        hover:file:bg-gray-100">
                                        <p class="mt-1 text-sm text-gray-500">Upload surat keterangan dokter/bidan
                                            (PDF/JPG/PNG)</p>
                                    </div>
                                </div>
                            </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4" style="background-color: #7C3AED; border: none;">
                                Submit Leave Form
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
    .text-purple {
        color: #7C3AED;
    }
    .cursor-pointer {
        cursor: pointer;
    }
    .card.border-2 {
        border-width: 2px !important;
        transition: all 0.3s ease;
    }
    .card.border-2:hover {
        border-color: #7C3AED !important;
        background-color: #F3E8FF;
    }
    input[type="radio"]:checked + label {
        border-color: #7C3AED !important;
        background-color: #F3E8FF;
    }
    input[type="radio"]:checked + label i.bi-check-circle-fill {
        display: block !important;
    }
    .form-control:focus, .form-select:focus {
        border-color: #7C3AED;
        box-shadow: 0 0 0 0.25rem rgba(124, 58, 237, 0.25);
    }
    </style>

    <script>
        function showForm() {
            const selectedCuti = document.querySelector('input[name="jenis_cuti"]:checked');
            const formCuti = document.getElementById('formCuti');
            let hminCuti = document.getElementById("cutiForm").dataset.hmin || 17;

            if (!selectedCuti) {
                alert('Silakan pilih jenis cuti terlebih dahulu');
                return;
            }

            // Tampilkan form
            formCuti.classList.remove('d-none');

            // Update judul form sesuai jenis cuti
            const jenisTitle = document.getElementById('jenisCutiTitle');
            switch (selectedCuti.value) {
                case 'tahunan':
                jenisTitle.textContent = 'ANNUAL LEAVE FORM';
                        document.getElementById('suratKeteranganField').classList.add('d-none');
                        document.getElementById('suratDokterField').classList.add('d-none');
                        document.getElementById('selectedJenisCuti').value = 'tahunan';

                        let start = document.getElementById("start");
                        let end = document.getElementById("end");

                        let today = new Date();
                        let minDate = new Date();
                        minDate.setDate(today.getDate() + parseInt(hminCuti)); // Gunakan nilai dari controller

                        let formattedMinDate = minDate.toISOString().split("T")[0];

                        // Terapkan hanya untuk cuti tahunan
                        end.setAttribute("min", formattedMinDate);
                        start.setAttribute("min", formattedMinDate);
                    break;
                case 'sakit':
                jenisTitle.textContent = 'SICK LEAVE FORM';
                        document.getElementById('suratDokterField').classList.remove('d-none');
                        document.getElementById('suratKeteranganField').classList.add('d-none');
                        document.getElementById('selectedJenisCuti').value = 'sakit';

                        // Hapus aturan batasan tanggal
                        document.getElementById("start").removeAttribute("min");
                        document.getElementById("end").removeAttribute("min");
                    break;
                case 'melahirkan':
                jenisTitle.textContent = 'MATERNITY LEAVE FORM';
                        document.getElementById('suratKeteranganField').classList.remove('d-none');
                        document.getElementById('suratDokterField').classList.add('d-none');
                        document.getElementById('selectedJenisCuti').value = 'melahirkan';

                        // Hapus aturan batasan tanggal
                        document.getElementById("start").removeAttribute("min");
                        document.getElementById("end").removeAttribute("min");
                    break;
            }

            // Sembunyikan pilihan jenis cuti
            document.getElementById('jenisCutiSelection').classList.add('d-none');

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
            formCuti.scrollIntoView({
                behavior: 'smooth'
            });

            // Set nilai hidden input untuk jenis cuti
            document.getElementById('selectedJenisCuti').value = selectedCuti.value;
        }

        function backToSelection() {
            // Tampilkan kembali pilihan jenis cuti
            document.getElementById('jenisCutiSelection').classList.remove('d-none');

            // Sembunyikan form
            const formCuti = document.getElementById('formCuti');
            formCuti.classList.add('d-none');

            // Reset semua field tambahan
            document.getElementById('suratDokterField').classList.add('d-none');
            document.getElementById('suratKeteranganField').classList.add('d-none');
            document.getElementById('alasanPentingField').classList.add('d-none');

            // Scroll ke pilihan jenis cuti
            document.getElementById('jenisCutiSelection').scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>

</x-app-layout>
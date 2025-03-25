<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 fw-semibold mb-0">Detail Pengajuan Cuti</h2>
            <a href="{{ route('cuti.approval.index') }}" class="btn btn-light btn-sm">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="container-fluid py-4">
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-body p-4">
                <!-- Informasi Karyawan -->
                <div class="mb-4">
                    <h5 class="fw-medium mb-3">Informasi Karyawan</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-medium text-muted">Nama Karyawan</label>
                            <p class="mb-0" id="nama">{{ $cuti->user->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium text-muted">Departemen</label>
                            <p class="mb-0" id="departemen">{{ $cuti->user->profil->department }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium text-muted">Jabatan</label>
                            <p class="mb-0">{{ $cuti->user->profil->position }}</p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Cuti -->
                <div class="mb-4">
                    <h5 class="fw-medium mb-3">Informasi Cuti</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-medium text-muted">Jenis Cuti</label>
                            <p class="mb-0" id="jenisCuti">{{ $cuti->jenis_cuti }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium text-muted">Tanggal Cuti</label>
                            <p class="mb-0" id="tanggalCuti">{{ \Carbon\Carbon::parse($cuti->start_date)->format('y-m-d') }} - {{ \Carbon\Carbon::parse($cuti->end_date)->format('y-m-d') }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium text-muted">Durasi</label>
                            <p class="mb-0" id="durasi">{{ $cuti->total_days }} Hari</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium text-muted">Alamat Selama Cuti</label>
                            <p class="mb-0" id="alamat">{{ $cuti->address }}</p>
                        </div>
                    </div>
                </div>

                <!-- Dokumen Pendukung -->
                <div class="mb-4">
                    <h5 class="fw-medium mb-3">Dokumen Pendukung</h5>
                    <div class="border rounded-3 p-3">
                        @if($cuti->jenis_cuti === 'sakit' && $cuti->doctor_letter)
                            <a href="{{ Storage::url($cuti->doctor_letter) }}" 
                               class="btn btn-link text-decoration-none" 
                               target="_blank">
                                <i class="bi bi-file-earmark-medical me-2"></i>
                                Lihat Surat Dokter
                            </a>
                        @elseif($cuti->jenis_cuti === 'melahirkan' && $cuti->supporting_letter)
                            <a href="{{ Storage::url($cuti->supporting_letter) }}" 
                               class="btn btn-link text-decoration-none" 
                               target="_blank">
                                <i class="bi bi-file-earmark-text me-2"></i>
                                Lihat Surat Keterangan Melahirkan
                            </a>
                        @else
                            <p class="text-muted mb-0">
                                <i class="bi bi-exclamation-circle me-2"></i>
                                Tidak ada dokumen pendukung
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="mt-4 d-flex justify-content-end gap-2">
                    <!-- Tombol Export Excel -->
                    <a href="{{ route('cuti.export-surat', $cuti->id) }}" 
                       class="btn btn-primary" 
                       title="Export ke Excel">
                        <i class="bi bi-file-earmark-excel me-2"></i>Export Excel
                    </a>

                    <!-- Tombol Reject -->
                    <form action="{{ route('cuti.approval.reject', $cuti->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menolak pengajuan cuti ini?')">
                            <i class="bi bi-x-circle me-2"></i>Reject
                        </button>
                    </form>

                    <!-- Tombol Approve -->
                    <form action="{{ route('cuti.approval.approve', $cuti->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin menyetujui pengajuan cuti ini?')">
                            <i class="bi bi-check-circle me-2"></i>Approve
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan Toast untuk notifikasi -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-check-circle me-2"></i>
                    <span id="successMessage"></span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="bi bi-x-circle me-2"></i>
                    <span id="errorMessage"></span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk menampilkan toast
        function showToast(type, message) {
            const toast = new bootstrap.Toast(document.getElementById(type + 'Toast'));
            document.getElementById(type + 'Message').textContent = message;
            toast.show();
        }

        // Tampilkan toast jika ada pesan sukses atau error dari session
        @if(session('success'))
            showToast('success', '{{ session('success') }}');
        @endif

        @if(session('error'))
            showToast('error', '{{ session('error') }}');
        @endif

        // Animasi loading saat submit form
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function() {
                const button = this.querySelector('button[type="submit"]');
                const originalText = button.innerHTML;
                button.disabled = true;
                button.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`;
                
                // Kembalikan tombol ke keadaan semula jika ada error
                setTimeout(() => {
                    button.disabled = false;
                    button.innerHTML = originalText;
                }, 3000);
            });
        });
    });
    </script>
    @endpush

    <style>
    .btn {
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn:active {
        transform: translateY(0);
    }

    .toast {
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .toast.show {
        opacity: 1;
    }
    </style>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endpush
</x-app-layout>

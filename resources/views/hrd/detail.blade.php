<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 fw-semibold mb-0">Detail Pengajuan Cuti</h2>
            <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm">
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
                            <p class="mb-0" id="nama">{{ $profil->user->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium text-muted">Departemen</label>
                            <p class="mb-0" id="departemen">{{ $profil->position }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium text-muted">Jabatan</label>
                            <p class="mb-0">{{ $profil->section }}</p>
                        </div>
                    </div>
                </div>

                <!-- Informasi Cuti -->
                <div class="mb-4">
                    <h5 class="fw-medium mb-3">Informasi Cuti</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-medium text-muted">Jenis Cuti</label>
                            <p class="mb-0" id="jenisCuti">{{ $cuti->jenis }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium text-muted">Tanggal Cuti</label>
                            <p class="mb-0" id="tanggalCuti">{{ $cuti->start }} - {{ $cuti->end }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium text-muted">Durasi</label>
                            <p class="mb-0" id="durasi">{{ $cuti->total_hari }} Hari</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium text-muted">Alamat Selama Cuti</label>
                            <p class="mb-0" id="alamat">{{ $cuti->alamat }}</p>
                        </div>
                    </div>
                </div>

                <!-- Dokumen Pendukung -->
                @if (!empty($cuti->foto))
                    <div class="mb-4">
                        <h5 class="fw-medium mb-3">Dokumen Pendukung</h5>
                        <div class="border rounded-3 p-3">
                            <a href="" target="_blank" class="text-decoration-none" style="color: #7C3AED;">
                                <i class="bi bi-download me-1"></i>
                                Lihat Surat Dokter
                            </a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <style>
        .btn-light {
            background-color: #F3F4F6;
            border-color: #E5E7EB;
        }

        .btn-light:hover {
            background-color: #E5E7EB;
        }
    </style>

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

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endpush
</x-app-layout>

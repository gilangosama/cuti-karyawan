<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 fw-semibold mb-0">Dashboard</h2>
            <div class="text-secondary">
                Sisa Cuti Tahunan: <span class="fw-bold text-purple">12 Hari</span>
            </div>
        </div>
    </x-slot>

    <div class="container-fluid py-4">
        <!-- Status Cards -->
        <div class="row g-4 mb-4">
            <!-- Cuti Diambil -->
            <div class="col-md-3">
                <div class="card border-0 h-100" style="background: linear-gradient(135deg, #4087F9, #2C5EBD); border-radius: 16px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center p-3 me-3" 
                                style="background: rgba(255, 255, 255, 0.2); width: 48px; height: 48px;">
                                <i class="bi bi-calendar-check text-white fs-4"></i>
                            </div>
                            <div class="text-white">
                                <div class="fs-6 fw-medium mb-1">Cuti Diambil</div>
                                <div class="fs-3 fw-bold">3 Hari</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengajuan -->
            <div class="col-md-3">
                <div class="card border-0 h-100" style="background: linear-gradient(135deg, #A66BFF, #7C3AED); border-radius: 16px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center p-3 me-3" 
                                style="background: rgba(255, 255, 255, 0.2); width: 48px; height: 48px;">
                                <i class="bi bi-file-text text-white fs-4"></i>
                            </div>
                            <div class="text-white">
                                <div class="fs-6 fw-medium mb-1">Pengajuan</div>
                                <div class="fs-3 fw-bold">2 Pending</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Disetujui -->
            <div class="col-md-3">
                <div class="card border-0 h-100" style="background: linear-gradient(135deg, #22C55E, #16A34A); border-radius: 16px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center p-3 me-3" 
                                style="background: rgba(255, 255, 255, 0.2); width: 48px; height: 48px;">
                                <i class="bi bi-check-circle text-white fs-4"></i>
                            </div>
                            <div class="text-white">
                                <div class="fs-6 fw-medium mb-1">Disetujui</div>
                                <div class="fs-3 fw-bold">5 Cuti</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ditolak -->
            <div class="col-md-3">
                <div class="card border-0 h-100" style="background: linear-gradient(135deg, #EF4444, #DC2626); border-radius: 16px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="rounded-circle d-flex align-items-center justify-content-center p-3 me-3" 
                                style="background: rgba(255, 255, 255, 0.2); width: 48px; height: 48px;">
                                <i class="bi bi-x-circle text-white fs-4"></i>
                            </div>
                            <div class="text-white">
                                <div class="fs-6 fw-medium mb-1">Ditolak</div>
                                <div class="fs-3 fw-bold">1 Cuti</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Riwayat Pengajuan -->
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-semibold mb-0">Riwayat Pengajuan Cuti</h5>
                    <div class="d-flex gap-2">
                        <select class="form-select form-select-sm" style="width: 150px;">
                            <option>Semua Status</option>
                            <option>Pending</option>
                            <option>Disetujui</option>
                            <option>Ditolak</option>
                        </select>
                        <input type="month" class="form-control form-control-sm" style="width: 150px;">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Jenis Cuti</th>
                                <th>Tanggal</th>
                                <th>Durasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cuti Tahunan</td>
                                <td>20/03/2024 - 22/03/2024</td>
                                <td>3 Hari</td>
                                <td>
                                    <span class="badge" style="background-color: #FCD34D; color: #92400E;">
                                        Pending
                                    </span>
                                </td>
                                <td>
                                    <a href="#" class="text-decoration-none" style="color: #7C3AED;">Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
    .card {
        transition: transform 0.2s;
    }
    .card:hover {
        transform: translateY(-4px);
    }
    .badge {
        padding: 6px 12px;
        font-weight: 500;
        border-radius: 20px;
    }
    .form-select, .form-control {
        border-radius: 8px;
        border-color: #E5E7EB;
    }
    .form-select:focus, .form-control:focus {
        border-color: #7C3AED;
        box-shadow: 0 0 0 0.25rem rgba(124, 58, 237, 0.25);
    }
    </style>
</x-app-layout>


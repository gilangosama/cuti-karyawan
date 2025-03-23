<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 fw-semibold mb-0">Approval HRD - Surat Cuti</h2>
        </div>
    </x-slot>

    <div class="container-fluid py-4">
        <!-- Filter Section -->
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px;">
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-medium">Status</label>
                        <select class="form-select">
                            <option value="">Semua Status</option>
                            <option value="pending">Menunggu</option>
                            <option value="approved">Disetujui</option>
                            <option value="rejected">Ditolak</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-medium">Jenis Cuti</label>
                        <select class="form-select">
                            <option value="">Semua Jenis</option>
                            <option value="annual">Cuti Tahunan</option>
                            <option value="sick">Cuti Sakit</option>
                            <option value="important">Cuti Penting</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-medium">Pencarian</label>
                        <input type="text" class="form-control" placeholder="Cari nama karyawan">
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Nama Karyawan</th>
                                <th>Jenis Cuti</th>
                                <th>Tanggal Cuti</th>
                                <th>Durasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center bg-purple-100 me-3" 
                                             style="width: 40px; height: 40px;">
                                            <span class="small fw-medium text-purple">JD</span>
                                        </div>
                                        <div>
                                            <div class="fw-medium">John Doe</div>
                                            <div class="small text-muted">IT Department</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Cuti Tahunan</td>
                                <td>20/03/2024 - 22/03/2024</td>
                                <td>3 Hari</td>
                                <td>
                                    <span class="badge" style="background-color: #FCD34D; color: #92400E;">
                                        Pending
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('cuti.approval.detail', 1) }}" 
                                       class="text-decoration-none" 
                                       style="color: #7C3AED;">Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
    .form-select, .form-control {
        border-radius: 8px;
        border-color: #E5E7EB;
    }
    .form-select:focus, .form-control:focus {
        border-color: #7C3AED;
        box-shadow: 0 0 0 0.25rem rgba(124, 58, 237, 0.25);
    }
    .badge {
        padding: 0.5rem 0.75rem;
        font-weight: 500;
        border-radius: 20px;
    }
    .bg-purple-100 {
        background-color: #F3E8FF;
    }
    .text-purple {
        color: #7C3AED;
    }
    </style>
</x-app-layout> 
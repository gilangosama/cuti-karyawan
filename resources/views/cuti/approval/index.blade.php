<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 fw-semibold mb-0">Approval Cuti</h2>
        </div>
    </x-slot>

    <div class="container-fluid py-4">
        <!-- Filter Section -->
        <div class="card border-0 shadow-sm rounded-3 mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-semibold mb-0">Filter Data</h5>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exportModal">
                        <i class="bi bi-file-excel me-2"></i>Export Excel
                    </button>
                </div>

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
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center bg-purple-100 me-3" 
                                             style="width: 40px; height: 40px;">
                                            <span class="small fw-medium text-purple">JS</span>
                                        </div>
                                        <div>
                                            <div class="fw-medium">Jane Smith</div>
                                            <div class="small text-muted">HR Department</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Cuti Sakit</td>
                                <td>25/03/2024 - 26/03/2024</td>
                                <td>2 Hari</td>
                                <td>
                                    <span class="badge bg-success">Disetujui</span>
                                </td>
                                <td>
                                    <button onclick="showDetail(2)" 
                                            class="btn btn-link p-0 text-decoration-none" 
                                            style="color: #7C3AED;">Detail</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Export -->
    <div class="modal fade" id="exportModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Export Data Cuti</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('cuti.export') }}" method="GET">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Periode</label>
                            <div class="row g-2">
                                <div class="col">
                                    <input type="date" name="start_date" class="form-control" placeholder="Tanggal Mulai">
                                </div>
                                <div class="col">
                                    <input type="date" name="end_date" class="form-control" placeholder="Tanggal Selesai">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="">Semua Status</option>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-file-excel me-2"></i>Export
                        </button>
                    </div>
                </form>
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
    .table > :not(caption) > * > * {
        padding: 1rem 0.75rem;
    }
    .table tbody tr:hover {
        background-color: #F9FAFB;
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
    .table thead th {
        font-size: 0.875rem;
        font-weight: 500;
        color: #6B7280;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    </style>
</x-app-layout>

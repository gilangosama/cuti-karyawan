<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 fw-semibold mb-0">Data Karyawan</h2>
            <a href="{{ route('hrd.create') }}" 
               class="btn btn-primary" 
               style="background-color: #7C3AED; border: none;">
                Tambah Karyawan
            </a>
        </div>
    </x-slot>

    <div class="container-fluid py-4">
        <!-- Filter Section -->
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px;">
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label small fw-medium">Departemen</label>
                        <select class="form-select">
                            <option value="">Semua Departemen</option>
                            <option value="it">IT</option>
                            <option value="hr">HR</option>
                            <option value="finance">Finance</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-medium">Status</label>
                        <select class="form-select">
                            <option value="">Semua Status</option>
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small fw-medium">Pencarian</label>
                        <input type="text" class="form-control" placeholder="Cari nama atau badge">
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
                                <th>Karyawan</th>
                                <th>Badge ID</th>
                                <th>Departemen</th>
                                <th>Jabatan</th>
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
                                            <div class="small text-muted">john.doe@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td>B001</td>
                                <td>IT Department</td>
                                <td>Software Engineer</td>
                                <td>
                                    <span class="badge bg-success">Aktif</span>
                                </td>
                                <td>
                                    <a href="{{ route('hrd.edit', 1) }}" 
                                       class="text-decoration-none me-3" 
                                       style="color: #7C3AED;">Edit</a>
                                    <a href="#" 
                                       class="text-decoration-none" 
                                       style="color: #DC2626;">Hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="small text-muted">
                        Menampilkan 1 sampai 10 dari 20 data
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item">
                                <a class="page-link" href="#">Previous</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#" 
                                   style="background-color: #7C3AED; border-color: #7C3AED;">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
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
    .table > :not(caption) > * > * {
        padding: 1rem 0.75rem;
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
    .page-link {
        color: #6B7280;
        border-radius: 8px;
        margin: 0 2px;
    }
    .page-link:hover {
        color: #7C3AED;
        background-color: #F3F4F6;
    }
    .page-item.active .page-link:hover {
        color: white;
    }
    </style>
</x-app-layout> 
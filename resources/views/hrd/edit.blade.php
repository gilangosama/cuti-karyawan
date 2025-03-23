<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 fw-semibold mb-0">Edit Data Karyawan</h2>
            <a href="{{ route('hrd.index') }}" class="btn btn-light btn-sm">Kembali</a>
        </div>
    </x-slot>

    <div class="container-fluid py-4">
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <form action="" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Informasi Pribadi -->
                <div class="card-body border-bottom">
                    <h5 class="fw-medium text-purple mb-4 bg-purple-soft p-3 rounded-3">
                        Informasi Pribadi
                    </h5>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label small fw-medium">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium">Email</label>
                            <input type="email" name="email" class="form-control" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium">Badge ID</label>
                            <input type="text" name="badge_id" class="form-control" value="">
                        </div>
                            {{-- <div class="col-md-6">
                                <label class="form-label small fw-medium">Nomor Telepon</label>
                                <input type="tel" name="phone" class="form-control" value="">
                            </div> --}}
                    </div>
                </div>

                <!-- Informasi Pekerjaan -->
                <div class="card-body border-bottom">
                    <h5 class="fw-medium text-purple mb-4 bg-purple-soft p-3 rounded-3">
                        Informasi Pekerjaan
                    </h5>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label small fw-medium">Departemen</label>
                            <select name="department" class="form-select">
                                <option value="">Pilih Departemen</option>
                                <option value="IT">IT</option>
                                <option value="HR">HR</option>
                                <option value="Finance">Finance</option>
                                <option value="Marketing">Marketing</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium">Jabatan</label>
                            <input type="text" name="position" class="form-control" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium">Tanggal Bergabung</label>
                            <input type="date" name="join_date" class="form-control" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium">Status Karyawan</label>
                            <select name="employment_status" class="form-select">
                                <option value="">Pilih Status</option>
                                <option value="permanent">Karyawan Tetap</option>
                                <option value="contract">Karyawan Kontrak</option>
                                <option value="probation">Masa Percobaan</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Pengaturan Approval -->
                <div class="card-body border-bottom">
                    <h5 class="fw-medium text-purple mb-4 bg-purple-soft p-3 rounded-3">
                        Pengaturan Approval
                    </h5>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label small fw-medium">Approval 1</label>
                            <select name="approval_1" class="form-select">
                                <option value="">Pilih Approval 1</option>
                                <option value="supervisor_1">Supervisor 1</option>
                                <option value="manager_1">Manager 1</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-medium">Approval 2</label>
                            <select name="approval_2" class="form-select">
                                <option value="">Pilih Approval 2</option>
                                <option value="manager_1">Manager 1</option>
                                <option value="director_1">Director 1</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="card-body d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4" style="background-color: #7C3AED; border: none;">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style>
    .form-control, .form-select {
        border-radius: 8px;
        padding: 0.6rem 0.75rem;
        border-color: #E5E7EB;
    }
    .form-control:focus, .form-select:focus {
        border-color: #7C3AED;
        box-shadow: 0 0 0 0.25rem rgba(124, 58, 237, 0.25);
    }
    .bg-purple-soft {
        background-color: #F3E8FF;
    }
    .text-purple {
        color: #7C3AED;
    }
    .btn-light {
        background-color: #F3F4F6;
        border-color: #E5E7EB;
    }
    .btn-light:hover {
        background-color: #E5E7EB;
    }
    </style>
</x-app-layout> 
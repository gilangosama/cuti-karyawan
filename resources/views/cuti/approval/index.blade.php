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
                <form method="GET" action="{{ route('cuti.approval.index') }}">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-semibold mb-0">Filter Data</h5>
                        {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exportModal">
                            <i class="bi bi-file-excel me-2"></i>Export Excel
                        </button> --}}
                    </div>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-medium">Status</label>
                            <select class="form-select" name="status">
                                <option value="">Semua Status</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu
                                </option>
                                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>
                                    Disetujui</option>
                                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-medium">Jenis Cuti</label>
                            <select class="form-select" name="jenis_cuti">
                                <option value="">Semua Jenis</option>
                                <option value="tahunan" {{ request('jenis_cuti') == 'tahunan' ? 'selected' : '' }}>Cuti
                                    Tahunan</option>
                                <option value="sakit" {{ request('jenis_cuti') == 'sakit' ? 'selected' : '' }}>Cuti
                                    Sakit</option>
                                <option value="melahirkan" {{ request('jenis_cuti') == 'melahirkan' ? 'selected' : '' }}>
                                    Melahirkan</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-medium">Pencarian</label>
                            <input type="text" class="form-control" name="search" placeholder="Cari nama karyawan"
                                value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>
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
                            @foreach ($cutiList as $cuti)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center bg-purple-100 me-3"
                                                style="width: 40px; height: 40px;">
                                                <span
                                                    class="small fw-medium text-purple">{{ substr($cuti->user->name, 0, 2) }}</span>
                                            </div>
                                            <div>
                                                <div class="fw-medium">{{ $cuti->user->name }}</div>
                                                <div class="small text-muted">{{ $cuti->user->profil->department }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $cuti->jenis_cuti }}</td>
                                    <td>{{ \Carbon\Carbon::parse($cuti->start_date)->format('y-m-d') }} - {{ \Carbon\Carbon::parse($cuti->end_date)->format('y-m-d') }}</td>
                                    <td>{{ $cuti->total_days }} Hari</td>
                                    <td>
                                        <span class="badge"
                                            style="background-color: {{ $cuti->status == 'pending' ? '#FCD34D' : ($cuti->status == 'approved' ? '#34D399' : '#F87171') }}; color: {{ $cuti->status == 'pending' ? '#92400E' : ($cuti->status == 'approved' ? '#065F46' : '#B91C1C') }};">
                                            {{ ucfirst($cuti->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('cuti.approval.detail', $cuti->id) }}"
                                            class="text-decoration-none" style="color: #7C3AED;">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    {{ $cutiList->appends(request()->query())->links() }}
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
                <form action="{{ route('cuti.export-selected') }}" method="GET">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Periode</label>
                            <div class="row g-2">
                                <div class="col">
                                    <input type="date" name="start_date" class="form-control"
                                        placeholder="Tanggal Mulai">
                                </div>
                                <div class="col">
                                    <input type="date" name="end_date" class="form-control"
                                        placeholder="Tanggal Selesai">
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
        .form-select,
        .form-control {
            border-radius: 8px;
            border-color: #E5E7EB;
        }

        .form-select:focus,
        .form-control:focus {
            border-color: #7C3AED;
            box-shadow: 0 0 0 0.25rem rgba(124, 58, 237, 0.25);
        }

        .table> :not(caption)>*>* {
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

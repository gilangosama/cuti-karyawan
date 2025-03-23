<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 fw-semibold mb-0">Data Cuti Karyawan</h2>
            <form method="GET" action="{{ route('cuti.index') }}" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary"
                    style="background-color: #7C3AED; border: none;">Cari</button>
            </form>
        </div>
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var alert = document.querySelector('.alert');
                if (alert) {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                }
            }, 3000); // 3 seconds
        });
    </script>

    <div class="container-fluid py-4">
        <!-- Table Section -->
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>No. Registrasi</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Jenis Cuti</th>
                                <th>Periode Cuti</th>
                                <th>Durasi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cutis as $cuti)
                                <tr>
                                    <td>{{ $cuti->id }}</td>
                                    <td>{{ $cuti->created_at->format('d M Y') }}</td>
                                    <td>{{ ucfirst($cuti->jenis) }}</td>
                                    <td>{{ $cuti->start }} - {{ $cuti->end }}</td>
                                    <td>{{ $cuti->total_hari }} Hari</td>
                                    <td>
                                        @if ($cuti->status == 'pending')
                                            <span class="badge bg-primary">Pending</span>
                                        @elseif ($cuti->status == 'approved')
                                            <span class="badge bg-success">Disetujui</span>
                                        @elseif ($cuti->status == 'rejected')
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data cuti yang ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="small text-muted">
                        Showing {{ $cutis->count() }} of {{ $cutis->total() }} results
                    </div>
                    <nav aria-label="Page navigation">
                        {{ $cutis->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
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

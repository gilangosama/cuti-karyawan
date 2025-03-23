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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tabel Data -->
            <div class="bg-white overflow-hidden shadow-sm rounded-xl">
                <div class="p-6">
                    <table class="min-w-full divide-y divide-gray-200">
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
                            @foreach ($cutis as $cuti)
                                <tr>
                                    <td>{{ $cuti->id }}</td>
                                    <td>{{ $cuti->created_at->format('d M Y') }}</td>
                                    <td>{{ ucfirst($cuti->jenis) }}</td>
                                    <td>{{ $cuti->start->format('d M Y') }} - {{ $cuti->end->format('d M Y') }}</td>
                                    <td>{{ $cuti->total_hari }} Hari</td>
                                    <td>
                                        <span class="badge"
                                            style="background-color: {{ $cuti->status == 'pending' ? '#FCD34D' : '#10B981' }}; color: {{ $cuti->status == 'pending' ? '#92400E' : '#FFFFFF' }};">
                                            {{ ucfirst($cuti->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="small text-muted">
                        Showing {{ $cutis->firstItem() }} to {{ $cutis->lastItem() }} of {{ $cutis->total() }}
                        results
                    </div>
                    <nav aria-label="Page navigation">
                        {{ $cutis->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <style>
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

        .table thead th {
            font-size: 0.875rem;
            font-weight: 500;
            color: #6B7280;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
    </style>
</x-app-layout>

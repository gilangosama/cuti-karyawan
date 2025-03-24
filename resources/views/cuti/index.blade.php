<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center py-2">
            <h2 class="h4 font-weight-bold mb-0">
                {{ __('Daftar Pengajuan Cuti') }}
            </h2>
            @if(auth()->user()->role !== 'hrd' && auth()->user()->role !== 'supervisor')
                <a href="{{ route('cuti.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus me-1"></i>{{ __('Ajukan Cuti') }}
                </a>
            @endif
        </div>
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show mx-3 mt-3" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="container-fluid px-3 py-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="row g-3 mb-4 align-items-center">
                    <div class="col-md-4">
                        <select id="status-filter" class="form-select form-select-sm">
                            <option value="">Semua Status</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" id="search" class="form-control form-control-sm" placeholder="Cari no. registrasi, jenis cuti...">
                        </div>
                    </div>
                    {{-- <div class="col-md-3 text-md-end">
                        <button onclick="exportSelected()" class="btn btn-success btn-sm me-2">
                            <i class="fas fa-download me-1"></i>Selected
                        </button>
                        <button onclick="exportAll()" class="btn btn-primary btn-sm">
                            <i class="fas fa-file-export me-1"></i>All
                        </button>
                    </div> --}}
                </div>

                <div class="table-responsive-md">
                    <table class="table table-hover table-striped">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" style="width: 50px;">
                                    <input type="checkbox" id="select-all" class="form-check-input">
                                </th>
                                <th>No. Registrasi</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Jenis Cuti</th>
                                <th>Periode</th>
                                <th>Durasi</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
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
                                        <span class="badge"
                                            style="background-color: {{ $cuti->status == 'pending' ? '#FCD34D' : '#10B981' }}; color: {{ $cuti->status == 'pending' ? '#92400E' : '#FFFFFF' }};">
                                            {{ ucfirst($cuti->status) }}
                                        </span>
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

                <div class="d-flex justify-content-end mt-4">
                    {{ $cutiList->links() }}
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => new bootstrap.Tooltip(el));

        document.getElementById('select-all').addEventListener('change', function() {
            document.querySelectorAll('.cuti-checkbox').forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    </script>
    @endpush
</x-app-layout>
xxx
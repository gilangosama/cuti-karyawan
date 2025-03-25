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
                            @foreach($cutiList as $cuti)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input cuti-checkbox" value="{{ $cuti->id }}">
                                </td>
                                <td class="fw-semibold">{{ $cuti->no_registrasi }}</td>
                                <td>{{ $cuti->created_at->format('d/m/Y') }}</td>
                                <td>{{ $cuti->jenis_cuti }}</td>
                                <td class="text-nowrap">
                                    {{ $cuti->start_date->format('d/m/Y') }} - {{ $cuti->end_date->format('d/m/Y') }}
                                </td>
                                <td>{{ $cuti->total_days }} hari</td>
                                <td>
                                    <span class="badge bg-{{ $cuti->status_color ?? 'secondary' }}">
                                        {{ ucfirst($cuti->status) }}
                                    </span>
                                </td>
                                <td class="text-center" style="white-space: nowrap;">
                                    <div class="d-flex justify-content-center gap-1">
                                        {{-- Tombol Export Surat --}}
                                        <a href="{{ route('cuti.export-surat', $cuti->id) }}" 
                                           class="btn btn-sm btn-outline-success" 
                                           data-bs-toggle="tooltip" title="Export Surat">
                                            <i class="fas fa-file-pdf">Export</i>
                                        </a>
                                
                                        {{-- Tombol Review Pengajuan (Hanya untuk Supervisor & HRD) --}}
                                        @if(auth()->user()->role === 'supervisor' || auth()->user()->role === 'hrd')
                                            <a href="{{ route('cuti.approval.update', $cuti->id) }}" 
                                               class="btn btn-sm btn-outline-primary" 
                                               data-bs-toggle="tooltip" title="Review Pengajuan">
                                                <i class="fas fa-clipboard-check">Review</i>
                                            </a>
                                        @endif
                                
                                        {{-- Tombol Hapus (Hanya jika status pending dan user yang sama) --}}
                                        @if(auth()->user()->id === $cuti->user_id && $cuti->status === 'pending')
                                            <form action="{{ route('cuti.destroy', $cuti->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                        data-bs-toggle="tooltip" title="Hapus Pengajuan"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash-alt">hapus</i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>                                
                            </tr>
                            @endforeach
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
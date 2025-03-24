<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Approval HRD') }}
        </h2>
    </x-slot>

    <div class="container-fluid py-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No. Registrasi</th>
                                <th>Nama</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Jenis Cuti</th>
                                <th>Periode</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cutiList as $cuti)
                                <tr>
                                    <td>{{ $cuti->no_registrasi }}</td>
                                    <td>{{ $cuti->user->name }}</td>
                                    <td>{{ $cuti->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $cuti->jenis_cuti }}</td>
                                    <td>{{ $cuti->start_date->format('d/m/Y') }} - {{ $cuti->end_date->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $cuti->status === 'approved' ? 'success' : 'warning' }}">
                                            {{ ucfirst($cuti->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <button type="button" 
                                                class="btn btn-sm btn-primary"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#approvalModal{{ $cuti->id }}">
                                            Review
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{ $cutiList->links() }}
            </div>
        </div>
    </div>

    @foreach($cutiList as $cuti)
        <!-- Modal Approval -->
        <div class="modal fade" id="approvalModal{{ $cuti->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('cuti.approval.update', $cuti->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Review Pengajuan Cuti</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="approved">Approve</option>
                                    <option value="rejected">Reject</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Catatan</label>
                                <textarea name="notes" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout> 
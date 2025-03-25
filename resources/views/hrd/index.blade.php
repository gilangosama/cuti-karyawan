<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 fw-semibold mb-0">Data Karyawan</h2>
            <a href="{{ route('hrd.create') }}" class="btn btn-primary" style="background-color: #7C3AED; border: none;">
                Tambah Karyawan
            </a>
        </div>
    </x-slot>

    <div class="container-fluid py-4">
        <!-- Filter Section -->
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 16px;">
            <div class="card-body p-4">
                <form method="GET" action="{{ route('hrd.index') }}">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label small fw-medium">Pencarian</label>
                            <input type="text" name="search" class="form-control" placeholder="Cari nama atau badge"
                                value="{{ request('search') }}">
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary"
                                style="background-color: #7C3AED; border: none;">Filter</button>
                        </div>
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
                                <th>Karyawan</th>
                                <th>No Badge</th>
                                <th>Departemen</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center bg-purple-100 me-3"
                                                style="width: 40px; height: 40px;">
                                                <span
                                                    class="small fw-medium text-purple">{{ substr($user->name, 0, 2) }}</span>
                                            </div>
                                            <div>
                                                <div class="fw-medium">{{ $user->name }}</div>
                                                <div class="small text-muted">{{ $user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($user->profil && $user->profil->no_badge)
                                            {{ $user->profil->no_badge }}
                                        @else
                                            <span>Tidak ada data</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->profil && $user->profil->position)
                                            {{ $user->profil->position }}
                                        @else
                                            <span class="text-muted">Tidak ada data</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->profil && $user->profil->section)
                                            {{ $user->profil->section }}
                                        @else
                                            <span class="text-muted">Tidak ada data</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('hrd.edit', $user->id) }}" class="text-decoration-none me-3"
                                            style="color: #7C3AED;">Edit</a>
                                        <form action="{{ route('hrd.destroy', $user->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-decoration-none"
                                                style="color: #DC2626;">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data karyawan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="small text-muted">
                        Menampilkan {{ $users->firstItem() }} sampai {{ $users->lastItem() }} dari
                        {{ $users->total() }} data
                    </div>
                    <nav aria-label="Page navigation">
                        {{ $users->links() }}
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

<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-semibold mb-0">Profile</h2>
    </x-slot>

    <div class="container-fluid py-4">
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-body p-4">
                @if(!auth()->user()->is_profile_completed)
                <div class="alert alert-warning d-flex align-items-center mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <div>Silakan lengkapi data profile Anda terlebih dahulu</div>
                </div>
                @endif

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <!-- Profile Header -->
                    <div class="row mb-4 pb-4 border-bottom">
                        <!-- Avatar -->
                        <div class="col-md-3 text-center">
                            <div class="position-relative d-inline-block">
                                <div class="rounded-circle bg-purple-soft d-flex align-items-center justify-content-center mx-auto" 
                                     style="width: 128px; height: 128px;">
                                    <span class="display-6 fw-bold text-purple">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </span>
                                </div>
                                <button type="button" class="btn btn-light btn-sm position-absolute bottom-0 end-0 rounded-circle shadow-sm">
                                    <i class="bi bi-camera"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Info -->
                        <div class="col-md-9">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-medium">Nama Lengkap</label>
                                    <input type="text" name="name" 
                                           value="{{ old('name', Auth::user()->name) }}" 
                                           class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-medium">Email</label>
                                    <input type="email" value="{{ Auth::user()->email }}" 
                                           class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Pekerjaan -->
                    <div class="mb-4">
                        <h5 class="fw-semibold mb-4">Informasi Pekerjaan</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-medium">Nomor Badge</label>
                                <input type="text" name="badge_number" 
                                       value="{{ old('badge_number', Auth::user()->badge_number) }}" 
                                       class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-medium">Tanggal Bergabung</label>
                                <input type="date" name="join_date" 
                                       value="{{ old('join_date', Auth::user()->join_date) }}" 
                                       class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-medium">Section</label>
                                <select name="department" class="form-select" required>
                                    <option value="">Pilih Section</option>
                                    @foreach(['IT', 'HR', 'Finance', 'Production'] as $dept)
                                        <option value="{{ $dept }}" 
                                                {{ old('department', Auth::user()->department) == $dept ? 'selected' : '' }}>
                                            {{ $dept }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-medium">Position</label>
                                <input type="text" name="position" 
                                       value="{{ old('position', Auth::user()->position) }}" 
                                       class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-medium">Status Kerja</label>
                                <select name="work_status" class="form-select" required>
                                    <option value="">Pilih Status</option>
                                    @foreach(['Shift', 'Non-Shift'] as $status)
                                        <option value="{{ $status }}" 
                                                {{ old('work_status', Auth::user()->work_status) == $status ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4" 
                                style="background-color: #7C3AED; border: none;">
                            Simpan Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
    .form-control, .form-select {
        border-radius: 8px;
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
    </style>
</x-app-layout> 
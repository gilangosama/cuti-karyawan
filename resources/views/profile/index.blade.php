<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-semibold mb-0">Profile</h2>
    </x-slot>

    <div class="container-fluid py-4">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="fw-semibold mb-4">Informasi Pribadi</h5>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">Nama</label>
                            <p class="mb-0">{{ $user->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">Email</label>
                            <p class="mb-0">{{ $user->email }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">Badge Number</label>
                            <p class="mb-0">{{ $user->badge_number }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5 class="fw-semibold mb-4">Informasi Pekerjaan</h5>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">Jabatan</label>
                            <p class="mb-0">{{ $user->profil->position ?? '-' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-medium">Department</label>
                            <p class="mb-0">{{ $user->profil->department ?? '-' }}</p>
                        </div>
                    </div>
                </div>
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
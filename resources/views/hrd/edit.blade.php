<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h4 fw-semibold mb-0">Edit Data Karyawan</h2>
            <a href="{{ route('hrd.index') }}" class="btn btn-light btn-sm">Kembali</a>
        </div>
    </x-slot>

    <div class="container-fluid py-4">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body">
                <form method="POST" action="{{ route('hrd.update', $employee->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input id="name" class="form-control" type="text" name="name"
                            value="{{ old('name', $employee->name) }}" required autofocus autocomplete="name"
                            placeholder="Masukkan nama lengkap">
                        @error('name')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" class="form-control" type="email" name="email"
                            value="{{ old('email', $employee->email) }}" required autocomplete="username"
                            placeholder="nama@email.com">
                        @error('email')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select">
                            <option value="user" {{ $employee->role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="Approval" {{ $employee->role == 'Approval' ? 'selected' : '' }}>Approval
                            </option>
                            <option value="hrd" {{ $employee->role == 'hrd' ? 'selected' : '' }}>HRD</option>
                        </select>
                        @error('role')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-100">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

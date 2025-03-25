@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            let alert = document.querySelector('.alert');
            if (alert) {
                alert.style.display = 'none';
            }
        }, 5000); // 5000 milliseconds = 5 seconds
    });
</script>

<form action="{{ route('profil.update', $profil->id) }}" method="post">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="no_badge">No Badge</label>
        <input type="number" class="form-control" id="no_badge" name="no_badge" value="{{ $profil->no_badge }}" required>
        <x-input-error class="mt-2 text-danger" :messages="$errors->get('no_badge')" />
    </div>
    <div class="form-group">
        <label for="section">Section</label>
        <input type="text" class="form-control" id="section" name="section" value="{{ $profil->section }}"
            required>
            <x-input-error class="mt-2 text-danger" :messages="$errors->get('section')" />
    </div>
    <div class="form-group">
        <label for="position">Position</label>
        <input type="text" class="form-control" id="position" name="position" value="{{ $profil->position }}"
            required>
            <x-input-error class="mt-2 text-danger" :messages="$errors->get('position')" />
    </div>
    <div class="form-group">
        <label for="join_date">Join Date</label>
        <input type="date" class="form-control" id="join_date" name="join_date" value="{{ $profil->join_date }}"
            required>
            <x-input-error class="mt-2 text-danger" :messages="$errors->get('join_date')" />
    </div>
    <div class="form-group">
        <label for="jenis">Jenis</label>
        <select class="form-control" id="jenis" name="jenis" required>
            <option value="shift" {{ $profil->jenis == 'shift' ? 'selected' : '' }}>Shift</option>
            <option value="non-shift" {{ $profil->jenis == 'non-shift' ? 'selected' : '' }}>Non-Shift</option>
        </select>
        <x-input-error class="mt-2 text-danger" :messages="$errors->get('jenis')" />
    </div>
    <button type="submit" class="btn btn-primary mt-2">Update Profile</button>
</form>

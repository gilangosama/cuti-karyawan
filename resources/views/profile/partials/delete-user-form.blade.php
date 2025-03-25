<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.destroy') }}" class="mt-6">
        @csrf
        @method('DELETE')

        <div class="mt-6">
            <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />
            <x-text-input
                id="password"
                name="password"
                type="password"
                class="form-control"
                placeholder="{{ __('Password') }}"
            />
            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="mt-6">
            <button type="submit" class="btn btn-danger">
                {{ __('Delete Account') }}
            </button>
        </div>
    </form>
</section>

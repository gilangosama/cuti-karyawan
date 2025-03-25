<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Profil;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(): View
    {
        return view('profile.index', [
            'user' => Auth::user(),
        ]);
    }

    public function edit(): View
    {
        return view('profile.edit', [
            'user' => Auth::user(),
            'profil' => Auth::user()->profil
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'department' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'join_date' => ['required', 'date'],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Update atau buat profil
        $user->profil()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'department' => $request->department,
                'position' => $request->position,
                'join_date' => $request->join_date,
            ]
        );

        return redirect()->route('profile.index')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updateProfil(Request $request, $id)
    {
        $profil = Profil::findOrFail($id);

        $request->validate([
            'no_badge' => 'required',
            'section' => 'required',
            'position' => 'required',
            'join_date' => 'required',
            'jenis' => 'required',
        ]);

        $profil->update([
            'no_badge' => $request->no_badge,
            'jenis' => $request->jenis,
            'position' => $request->position,
            'section' => $request->section,
            'join_date' => $request->join_date,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }
}

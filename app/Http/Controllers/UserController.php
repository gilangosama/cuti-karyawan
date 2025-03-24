<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('profil'); // Use query builder

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $users = $query->paginate(10); // Use query builder for pagination

        return view('hrd.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'badge_id' => 'required|string|max:255|unique:users',
            'role' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'badge_id' => $request->badge_id,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('hrd.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $employee = User::findOrFail($id);
        return view('hrd.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $employee = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $employee->id,
            'role' => 'required|string',
        ]);

        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('hrd.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $employee = User::findOrFail($id);
        $employee->delete();

        return redirect()->route('hrd.index')->with('success', 'User deleted successfully.');
    }
}

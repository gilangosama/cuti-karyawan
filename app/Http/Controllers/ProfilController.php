<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function update(Request $request, $id)
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

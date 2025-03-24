<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiApprovalController extends Controller
{
    public function index()
    {
        $cutiList = Cuti::query()
            ->when(auth()->user()->role === 'supervisor', function ($query) {
                return $query->whereHas('user', function ($q) {
                    $q->where('department', auth()->user()->profil->department);
                });
            })
            ->with(['user', 'approval1', 'approval2', 'hrd'])
            ->latest()
            ->paginate(10);

        return view('cuti.approval.index', compact('cutiList'));
    }

    public function update(Request $request, Cuti $cuti)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'notes' => 'nullable|string'
        ]);

        try {
            $cuti->status = $request->status;
            $cuti->notes = $request->notes;

            if (auth()->user()->role === 'supervisor') {
                $cuti->approval1_id = auth()->id();
                $cuti->approval1_date = now();
            } elseif (auth()->user()->role === 'hrd') {
                $cuti->approval2_id = auth()->id();
                $cuti->approval2_date = now();
            }

            $cuti->save();

            return redirect()->back()->with('success', 'Status cuti berhasil diupdate');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function detail()
    {
        return view('cuti.approval.detail');
    }

    public function hrd()
    {
        $cutiList = Cuti::query()
            ->where('status', 'approved')
            ->whereNotNull('approval1_id')
            ->with(['user', 'approval1', 'approval2', 'hrd'])
            ->latest()
            ->paginate(10);

        return view('cuti.approval.hrd', compact('cutiList'));
    }
}
    
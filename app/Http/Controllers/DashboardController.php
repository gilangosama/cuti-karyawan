<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $cutis = Cuti::where('user_id', Auth::id())->get();
        $total_days = Cuti::where('user_id', Auth::id())->where('status', 'approved')->sum('total_days');
        if ($total_days == null) {
            $total_days = 0;
        }
        $pengajuan = Cuti::where('user_id', Auth::id())->where('status', 'pending')->sum('total_days');
        if ($pengajuan == null) {
            $pengajuan = 0;
        }
        $rejected = Cuti::where('user_id', Auth::id())->where('status', 'rejected')->sum('total_days');
        if ($rejected == null) {
            $rejected = 0;
        }
        $approved = Cuti::where('user_id', Auth::id())->where('status', 'approved')->sum('total_days');
        if ($approved == null) {
            $approved = 0;
        }
        $kouta = profil::where('user_id', Auth::id())->first();
        $sisa_cuti = $kouta->kouta;

        if ($request->status) {
            $cutis = Cuti::where('user_id', Auth::id())->where('status', $request->status)->get();
        }

        // dd($sisa_cuti);
        return view('dashboard', compact('cutis', 'total_days', 'sisa_cuti', 'pengajuan', 'rejected', 'approved'));
    }

    public function detail($id)
    {
        $cuti = Cuti::with('cutiApproval')->findOrFail($id);
        $profil = Profil::with('user')->where('user_id', Auth::id())->first();
        // dd($cuti, $profil);
        return view('hrd.detail', compact('cuti', 'profil'));
    }
}

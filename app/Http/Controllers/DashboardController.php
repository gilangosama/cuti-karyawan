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
        // Ambil data cuti untuk user yang sedang login
        $cutis = Cuti::where('user_id', Auth::id());
        
        // Jika ada filter status
        if ($request->status) {
            $cutis = $cutis->where('status', $request->status);
        }
        
        // Hitung jumlah pengajuan (count jumlah record, bukan sum total_days)
        $pengajuan = Cuti::where('user_id', Auth::id())
                        ->where('status', 'pending')
                        ->count();
        
        // Hitung jumlah yang disetujui (count jumlah record)
        $approved = Cuti::where('user_id', Auth::id())
                        ->where('status', 'approved')
                        ->count();
        
        // Hitung jumlah yang ditolak (count jumlah record)
        $rejected = Cuti::where('user_id', Auth::id())
                        ->where('status', 'rejected')
                        ->count();
        
        // Hitung total hari cuti yang sudah diambil (sum total_days yang approved)
        $total_days = Cuti::where('user_id', Auth::id())
                        ->where('status', 'approved')
                        ->sum('total_days');
        
        // Ambil kuota cuti dari profil
        $kouta = Profil::where('user_id', Auth::id())->first();
        $sisa_cuti = $kouta->kouta;
        
        // Get final cutis collection
        $cutis = $cutis->latest()->get();

        return view('dashboard', compact(
            'cutis',
            'total_days',
            'sisa_cuti',
            'pengajuan',
            'rejected',
            'approved'
        ));
    }

    public function detail($id)
    {
        $cuti = Cuti::with('cutiApproval')->findOrFail($id);
        $profil = Profil::with('user')->where('user_id', Auth::id())->first();
        // dd($cuti, $profil);
        return view('hrd.detail', compact('cuti', 'profil'));
    }
}

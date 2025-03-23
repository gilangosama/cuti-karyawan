<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\Event;
use App\Models\SetupApp;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;

class CutiController extends Controller
{
    public function index()
    {
        $cutis = Cuti::where('user_id', Auth::id())->get();
        return view('cuti.index', compact('cutis'));
    }

    public function create()
    {
        $approvals = User::with('profil')->where('role', 'approval')->get();
        $hrds = User::with('profil')->where('role', 'hrd')->get(); // Personal
        $hMinCuti = SetupApp::first()->cuti;
        // dd($hMinCuti);
        return view('cuti.create', compact('approvals', 'hrds', 'hMinCuti'));
    }

    public function store(Request $request)
    {
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);
        // Buat periode antara tanggal mulai dan selesai
        $periode = CarbonPeriod::create($start, $end);

        // Ambil daftar hari libur dari tabel Event
        $hariLibur = Event::pluck('start')->toArray();
        // hari libur di hari minggu
        

        // dd('hari libur event :' . $hariLibur);
        // Ambil daftar hari kerja dari database
        $hariKerja = SetupApp::first()->days;

        // Ubah string hari kerja menjadi array integer
        $hariKerja = array_map('intval', explode(',', $hariKerja));

        $totalHari = 0;

        foreach ($periode as $tanggal) {
            // Pastikan tanggal bukan hari libur dan termasuk hari kerja
            if (in_array($tanggal->dayOfWeek, $hariKerja) && !in_array($tanggal->toDateString(), $hariLibur)) {
                $totalHari++;
            }
        }

        $kouta = Auth::user()->profil->kouta;

        if ($totalHari > $kouta) {
            dd("Peringatan: Waktu cuti yang diambil melebihi batas sisa waktu cuti.");
            return redirect()->route('cuti.index')->with('error', 'Waktu cuti yang diambil melebihi batas sisa waktu cuti.');
        }

        // Debugging dengan format yang benar
        dd(
            "Awal Cuti: " . $start->toDateString(),
            "Akhir Cuti: " . $end->toDateString(),
            "Hari Libur: " . json_encode($hariLibur),
            "Hari Kerja: " . implode(',', $hariKerja),
            "Total Hari: " . $totalHari,
            "Kouta: " . $kouta
        );

        $data['user_id'] = Auth::id();
        $data['status'] = 'pending';

        Cuti::create($data);

        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil diajukan.');
    }

    public function edit(Cuti $cuti)
    {
        return view('cuti.edit', compact('cuti'));
    }

    public function update(Request $request, Cuti $cuti)
    {
        $data = $request->validate([
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'description' => 'required|string',
        ]);

        $cuti->update($data);

        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil diperbarui.');
    }

    public function destroy(Cuti $cuti)
    {
        $cuti->delete();

        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\CutiNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\CutiApproval;
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
        $cutis = Cuti::with('cutiApproval')->where('user_id', Auth::id())->get();
        if (!$cutis) {
            $cutis = "Tidak ada data cuti.";
        }

        return view('cuti.index', compact('cutis'));
    }

    public function create()
    {
        $approvals = User::with('profil')->where('role', 'approval')->get();
        $hrds = User::with('profil')->where('role', 'hrd')->get();
        
        // Tambahkan pengecekan null
        $setupApp = SetupApp::first();
        $hMinCuti = $setupApp ? $setupApp->cuti : 0; // Default 0 jika setup belum ada
        
        return view('cuti.create', compact('approvals', 'hrds', 'hMinCuti'));
    }

    public function store(Request $request)
    {
        $jenisCuti = $request->jenis_cuti;
        if ($jenisCuti == 'tahunan') {
            $start = Carbon::parse($request->start);
            $end = Carbon::parse($request->end);
            // Buat periode antara tanggal mulai dan selesai
            $periode = CarbonPeriod::create($start, $end);

            // Ambil daftar hari libur dari tabel Event
            $hariLibur = Event::pluck('start')->toArray();
            // hari libur di hari minggu

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
            $cekdata = Cuti::where('user_id', Auth::id())->where('status', 'pending')->get();
            $kouta = Auth::user()->profil->kouta;
            $updateKouta = $kouta - $totalHari;

            if ($totalHari > $kouta) {
                return redirect()->route('cuti.index')->with('error', 'Waktu cuti yang diambil melebihi batas sisa waktu cuti.');
            }
            if ($cekdata->count() > 0) {
                return redirect()->route('cuti.index')->with('error', 'Anda masih memiliki penagjuan cuti yang belom selesai.');
            }

            $cuti = Cuti::create([
                'user_id' => Auth::id(),
                'jenis' => $jenisCuti,
                'start' => $start,
                'end' => $end,
                'total_hari' => $totalHari,
                'status' => 'pending',
                'description' => $request->description,
            ]);

            CutiApproval::insert([
                [
                    'cuti_id' => $cuti->id,
                    'user_id' => $request->approval_1,
                    'approval' => 'approval_1',
                    'status' => 'pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'cuti_id' => $cuti->id,
                    'user_id' => $request->approval_2,
                    'approval' => 'approval_2',
                    'status' => 'pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
            $approval1Email = User::where('id', $request->approval_1)->value('email');
            $approval2Email = User::where('id', $request->approval_2)->value('email');

            // Kirim email ke approval_1
            if ($approval1Email) {
                Mail::to($approval1Email)->send(new CutiNotification($cuti));
            }

            // Kirim email ke approval_2 (opsional)
            if ($approval2Email) {
                Mail::to($approval2Email)->send(new CutiNotification($cuti));
            }

            $profil = Auth::user()->profil;
            $profil->kouta = $updateKouta;
            $profil->save();

            return redirect()->route('cuti.index')->with('success', 'Cuti berhasil diajukan.');
        } else if ($jenisCuti == 'sakit') {
            $cuti = Cuti::create([
                'user_id' => Auth::id(),
                'jenis' => $jenisCuti,
                'start' => Carbon::parse($request->start),
                'end' => Carbon::parse($request->end),
                'total_hari' => $request->total_days,
                'status' => 'pending',
                'description' => $request->description,
            ]);

            CutiApproval::insert([
                [
                    'cuti_id' => $cuti->id,
                    'user_id' => $request->approval_1,
                    'approval' => 'approval_1',
                    'status' => 'pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'cuti_id' => $cuti->id,
                    'user_id' => $request->approval_2,
                    'approval' => 'approval_2',
                    'status' => 'pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

            $approval1Email = User::where('id', $request->approval_1)->value('email');
            $approval2Email = User::where('id', $request->approval_2)->value('email');

            if ($approval1Email) {
                Mail::to($approval1Email)->send(new CutiNotification($cuti));
            }

            if ($approval2Email) {
                Mail::to($approval2Email)->send(new CutiNotification($cuti));
            }

            return redirect()->route('cuti.index')->with('success', 'Cuti sakit berhasil diajukan.');
        } else if ($jenisCuti == 'melahirkan') {
            $cuti = Cuti::create([
                'user_id' => Auth::id(),
                'jenis' => $jenisCuti,
                'start' => Carbon::parse($request->start),
                'end' => Carbon::parse($request->end),
                'total_hari' => $request->total_days,
                'status' => 'pending',
                'description' => $request->description,
            ]);

            CutiApproval::insert([
                [
                    'cuti_id' => $cuti->id,
                    'user_id' => $request->approval_1,
                    'approval' => 'approval_1',
                    'status' => 'pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'cuti_id' => $cuti->id,
                    'user_id' => $request->approval_2,
                    'approval' => 'approval_2',
                    'status' => 'pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

            $approval1Email = User::where('id', $request->approval_1)->value('email');
            $approval2Email = User::where('id', $request->approval_2)->value('email');

            if ($approval1Email) {
                Mail::to($approval1Email)->send(new CutiNotification($cuti));
            }

            if ($approval2Email) {
                Mail::to($approval2Email)->send(new CutiNotification($cuti));
            }

            return redirect()->route('cuti.index')->with('success', 'Cuti melahirkan berhasil diajukan.');
        } else {
            return redirect()->route('cuti.index')->with('error', 'Jenis cuti tidak dikenali.');
        }

        // Debugging dengan format yang benar
        // dd(
        //     "Awal Cuti: " . $start->toDateString(),
        //     "Akhir Cuti: " . $end->toDateString(),
        //     "Hari Libur: " . json_encode($hariLibur),
        //     "Hari Kerja: " . implode(',', $hariKerja),
        //     "Total Hari: " . $totalHari,
        //     "Kouta: " . $kouta
        // );

        return redirect()->route('cuti.index')->with('error', 'Jenis cuti tidak dikenali.');
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

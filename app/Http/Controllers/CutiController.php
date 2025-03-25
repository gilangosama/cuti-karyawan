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
use App\Exports\SuratCutiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MultiSuratCutiExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CutiController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // Hapus middleware di constructor
        // $this->middleware('auth');   
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $cutiList = Cuti::with(['user.profil', 'approval1', 'approval2', 'hrd'])
                ->where('user_id', auth()->id())
                ->latest()
                ->paginate(10);

            return view('cuti.index', compact('cutiList'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            // Ambil data approvers dan hrds
            $approvers = User::where('role', 'approval')->get();
            $hrds = User::where('role', 'hrd')->get();

            // Tambahkan pengecekan null
            $setupApp = SetupApp::first();
            $hMinCuti = $setupApp ? $setupApp->cuti : 0;
            
            return view('cuti.create', compact('approvers', 'hrds', 'hMinCuti'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $rules = [
                'jenis_cuti' => 'required|in:tahunan,sakit,melahirkan',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'address' => 'required|string',
                'approval_1' => 'required|exists:users,id',
                'approval_2' => 'required|exists:users,id',
                'hrd_approval' => 'required|exists:users,id',
            ];

            // Tambah validasi dokumen berdasarkan jenis cuti
            if ($request->jenis_cuti === 'sakit') {
                $rules['doctor_letter'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:2048';
            } elseif ($request->jenis_cuti === 'melahirkan') {
                $rules['supporting_letter'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:2048';
            }

            $validated = $request->validate($rules);

            DB::beginTransaction();

            try {
                // Generate nomor registrasi
                $noRegistrasi = 'CUTI-' . auth()->id() . '-' . now()->timestamp;

                // Hitung total hari
                $startDate = Carbon::parse($request->start_date);
                $endDate = Carbon::parse($request->end_date);
                $totalDays = $startDate->diffInDays($endDate) + 1;

                // Buat record cuti baru
                $cuti = new Cuti();
                $cuti->user_id = auth()->id();
                $cuti->no_registrasi = $noRegistrasi;
                $cuti->jenis_cuti = $request->jenis_cuti;
                $cuti->start_date = $startDate;
                $cuti->end_date = $endDate;
                $cuti->total_days = $totalDays;
                $cuti->address = $request->address;
                $cuti->status = 'pending';
                $cuti->approval1_id = $request->approval_1;
                $cuti->approval2_id = $request->approval_2;
                $cuti->hrd_id = $request->hrd_approval;

                // Handle upload dokumen untuk cuti sakit
                if ($request->hasFile('doctor_letter')) {
                    $file = $request->file('doctor_letter');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs('dokumen-cuti', $fileName, 'public');
                    $cuti->doctor_letter = $path;
                }

                // Handle upload dokumen untuk cuti melahirkan
                if ($request->hasFile('supporting_letter')) {
                    $file = $request->file('supporting_letter');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $path = $file->storeAs('dokumen-cuti', $fileName, 'public');
                    $cuti->supporting_letter = $path;
                }

                // Simpan cuti
                $cuti->save();

                DB::commit();

                return redirect()->route('cuti.index')
                    ->with('success', 'Pengajuan cuti berhasil dibuat');

            } catch (\Exception $e) {
                DB::rollback();
                \Log::error('Error saat menyimpan cuti: ' . $e->getMessage());
                return back()
                    ->withInput()
                    ->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
            }

        } catch (\Exception $e) {
            \Log::error('Error saat validasi: ' . $e->getMessage());
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat validasi: ' . $e->getMessage());
        }
    }

    public function edit(Cuti $cuti)
    {
        if ($cuti->user_id !== auth()->id()) {
            return back()->with('error', 'Anda tidak memiliki izin untuk mengedit cuti ini.');
        }

        return view('cuti.edit', compact('cuti'));
    }


    public function update(Request $request, Cuti $cuti)
    {
        if ($cuti->user_id !== auth()->id()) {
            return back()->with('error', 'Anda tidak memiliki izin untuk mengedit cuti ini.');
        }

        $data = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'required|string',
        ]);

        $cuti->update($data);

        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil diperbarui.');
    }


    public function destroy(Cuti $cuti)
    {
        if ($cuti->user_id !== auth()->id()) {
            return back()->with('error', 'Anda tidak memiliki izin untuk menghapus cuti ini.');
        }

        $cuti->delete();

        return redirect()->route('cuti.index')->with('success', 'Cuti berhasil dihapus.');
    }


    public function exportSurat(Cuti $cuti)
    {
        try {
            // Eager load semua relasi yang dibutuhkan termasuk profil
            $cuti = $cuti->load([
                'user.profil', 
                'approval1.profil', 
                'approval2.profil', 
                'hrd.profil'
            ]);
            
            if (!$cuti->user) {
                return back()->with('error', 'Data user tidak ditemukan');
            }

            // Konversi tanggal ke Carbon jika belum
            if ($cuti->start_date && !$cuti->start_date instanceof \Carbon\Carbon) {
                $cuti->start_date = \Carbon\Carbon::parse($cuti->start_date);
            }
            
            if ($cuti->end_date && !$cuti->end_date instanceof \Carbon\Carbon) {
                $cuti->end_date = \Carbon\Carbon::parse($cuti->end_date);
            }

            $export = new SuratCutiExport($cuti);
            return $export->export();
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat export: ' . $e->getMessage());
        }
    }

    public function exportSelected(Request $request)
    {
        $ids = explode(',', $request->ids);
        $cutis = Cuti::whereIn('id', $ids)->get();
        
        return Excel::download(new MultiSuratCutiExport($cutis), 'surat-cuti-selected-'.date('Y-m-d').'.xlsx');
    }

    public function exportAll()
    {
        $cutis = Cuti::all();
        return Excel::download(new MultiSuratCutiExport($cutis), 'surat-cuti-all-'.date('Y-m-d').'.xlsx');
    }
}

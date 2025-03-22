<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetupAppController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'cuti' => 'required|integer',
            'izin' => 'required|integer',
            'days' => 'required|array',
            'days.*' => 'integer',
        ]);

        DB::table('setup_app')->updateOrInsert(
            ['id' => 1],
            [
                'cuti' => $data['cuti'],
                'izin' => $data['izin'],
                'days' => json_encode($data['days']),
            ]
        );

        return response()->json(['success' => true]);
    }

    public function get()
    {
        $setup = DB::table('setup_app')->where('id', 1)->first();
        if ($setup) {
            $setup->days = json_decode($setup->days);
        }
        return response()->json($setup);
    }
}

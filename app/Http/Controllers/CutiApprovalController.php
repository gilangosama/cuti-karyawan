<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CutiApprovalController extends Controller
{
    public function index()
    {
        return view('cuti/approval/index');
    }
}
    
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\laporan;

class LaporanController extends Controller
{
    public function index()
    {
        return view('AdminApotek/laporan');
    }
}

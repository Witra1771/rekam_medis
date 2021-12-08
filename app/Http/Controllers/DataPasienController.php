<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Dompdf\Dompdf;
use Session;
use Alert;
use App\Models\Spesialis;
use App\Models\antrean;
use App\Models\Pasien;
use App\Models\User;
use App\Models\Obat;

class PemeriksaanController extends Controller
{
    public function index()
    {
        $Pasien = pasien::all();
        $User = User::all();
        $Obat = Obat::all();
        $Antrean = Antrean::all();
        $Spesialis = Spesialis::all();
        $lastId = DB::table('pasien')->orderBy('foto_ktp', 'desc')->first();
        $User = User::all()->whereNotNull('dokter_spesialis');
        $Pantrean = DB::table('antrean')
                    ->leftJoin('pasien', 'antrean.pasien','=','pasien.nik')
                    ->select('antrean.*', 'pasien.*')
                    ->get();


        if ($lastId == null) {
            $Id = substr(date("Y").date("mm"),2)."0001";

            $data = [
                'Id' => $Id,
                'obat' => $Pasien
            ];
        }else{
            $d = substr($lastId->id_pasien,7);
            $count = strlen(round($d));
            $id = $d+1;
            
            $no = '0'.$id;
    
            $Id = substr(date("Y").date("m").date("d"),2).$no;
    
        }
        $data = [
            'Id'        => $Id,
            'pasien'    => $Pasien,
            'user'      => $User,
            'obat'      => $Obat,
            'antrean'      => $Antrean,
            'Pantrean'      => $Pantrean,
            'spesialis'      => $Spesialis,
            'judul_antrean' => 'Antrean'
        ];
        // $pdf = PDF::load
        return view('Dokter.data_pasien')->with($data);
    }
}

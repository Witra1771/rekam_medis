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
use App\Models\Pemeriksaan;
use App\Models\Pasien;
use App\Models\User;
use App\Models\Obat;
use App\Models\resepObat;

class dataPasienApotekerController extends Controller
{
    public function index()
    {
        $Pasien = pasien::all();
        $User = User::all();
        $Obat = Obat::all();
        $resepObat = DB::table('resep_obat')
                    ->leftJoin('obat', 'resep_obat.id_obat','=','obat.id_obat')
                    ->select('resep_obat.*', 'obat.*')
                    ->get();
        $Antrean = Antrean::all();
        $pemeriksaan = DB::table('pemeriksaan')->orderBy('id_pemeriksaan', 'desc')->get();
        $Spesialis = Spesialis::all();
        $lastId = DB::table('pasien')->orderBy('foto_ktp', 'desc')->first();
        $User = User::all()->whereNotNull('dokter_spesialis');
        $Pantrean = DB::table('antrean')
                    ->leftJoin('pasien', 'antrean.pasien','=','pasien.nik')
                    ->select('antrean.*', 'pasien.*')
                    ->get();
        $Pemeriksaan = DB::table('pemeriksaan')
        ->leftJoin('antrean', 'pemeriksaan.id_antrean','=','antrean.id_antrean')
        ->leftJoin('pasien', 'pemeriksaan.id_pasien','=','pasien.id_pasien')
        ->leftJoin('resep_obat', 'pemeriksaan.id_RO','=','resep_obat.id_RO')
        ->select('pemeriksaan.*', 'antrean.*', 'pasien.nama_pasien','resep_obat.id_obat')
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
            'resepObat'      => $resepObat,
            'antrean'      => $Antrean,
            'Pantrean'      => $Pantrean,
            'Pemeriksaan'      => $Pemeriksaan,
            'pemeriksaan'      => $pemeriksaan,
            'spesialis'      => $Spesialis,
            'judul_antrean' => 'Antrean'
        ];
        // $pdf = PDF::load
        return view('Apoteker.data_pasien')->with($data);
    }
}

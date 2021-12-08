<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;use DB;
use PDF;
use Dompdf\Dompdf;
use Session;
use Alert;
use Livewire\Component;
use App\Models\PemeriksaanModel;
use App\Models\resepObat;
use App\Models\Spesialis;
use App\Models\antrean;
use App\Models\Pasien;
use App\Models\User;
use App\Models\Obat;

class Pemeriksaan extends Component
{
    public $nama = "kl";
    public function index()
    {
        $Pasien = pasien::all();
        $User = User::all();
        $Obat = Obat::all();
        $Antrean = Antrean::all();
        $Spesialis = Spesialis::all();
        $lastId = DB::table('pasien')->orderBy('foto_ktp', 'desc')->first();
        $lastIdP = DB::table('pemeriksaan')->orderBy('id_pemeriksaan', 'desc')->first();
        $User = User::all()->whereNotNull('dokter_spesialis');
        $lastRO = DB::table('resep_obat')->orderBy('id_RO', 'desc')->first();
        if ($lastIdP == null) {
            $IdP = substr(date("Y").date("m").date("d"),2)."001";
        }else{
            $d = substr($lastIdP->id_pemeriksaan,7);
            $count = strlen(round($d));
            $id = $d+1;
            
            $no = '0'.$id;
    
            $IdP = substr(date("Y").date("m").date("d"),2)."0"  .$no;
    
        }
        if ($lastRO == null) {
            $IdRO = substr(date("Y").date("mm"),2)."001";
        }else{
            $d = substr($lastRO->id_RO,7);
            $count = strlen(round($d));
            $id = $d+1;
            
            $no = '0'.$id;
    
            $IdRO = substr(date("Y").date("m").date("d"),2).$no;
    
        }
        if ($lastId == null) {
            $Id = substr(date("Y").date("mm"),2)."001";

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
        echo $IdRO;
        $data = [
            'Id'        => $Id,
            'IdP'        => $IdP,
            'IdRO'        => $IdRO,
            'pasien'    => $Pasien,
            'user'      => $User,
            'obat'      => $Obat,
            'antrean'      => $Antrean,
            'spesialis'      => $Spesialis,
            'judul_antrean' => 'Antrean'
        ];
        // $pdf = PDF::loads
        return view('livewire.pemeriksaan')->with($data);
    }
    public function render()
    {
        return view('livewire.pemeriksaan');
    }
}

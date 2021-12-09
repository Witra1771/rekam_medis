<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Alert;
use App\Models\Spesialis;
use App\Models\antrean;
use App\Models\Pasien;
use App\Models\User;
use PDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class AntreanController extends Controller
{
    public function index()
    {
        $Pasien = pasien::all();
        $User = User::all();
        $Antrean = Antrean::all();
        $Spesialis = Spesialis::all();
        $lastId = DB::table('pasien')->orderBy('foto_ktp', 'desc')->first();
        $User = User::all()->whereNotNull('dokter_spesialis');
        $Tantrean = DB::table('antrean')
                    ->leftJoin('user', 'antrean.dokter','=','user.id_user')
                    ->leftJoin('spesialis', 'antrean.spesialis','=','spesialis.kode_spesialis')
                    ->leftJoin('pasien', 'antrean.pasien','=','pasien.nik')
                    ->select('antrean.*', 'user.nama', 'pasien.nama_pasien', 'spesialis.spesialis_kedokteran')
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
            'tantrean'  => $Tantrean,
            'antrean'   => $Antrean,
            'spesialis' => $Spesialis
        ];
        return view('AdminPendaftaran.antrean')->with($data);
    }
    public function proses($id_antrean){
        $antrean = Antrean::find($id_antrean);
        $antrean->Status             = "Proses";
        $antrean->update();
        
        Alert::success('Pasien '.$antrean->nama." Sedang Melakukan Pemeriksaan");
        return redirect(url('/antrean'));
    }

    public function cetak($id_antrean){
        $data_antri = DB::table('antrean')->join('user', 'user.id_user', '=', 'antrean.dokter')->join('pasien', 'pasien.nik', '=', 'antrean.pasien')->where('antrean.id_antrean','=',$id_antrean)->first();
        $kunjungan = DB::table('antrean')->where('pasien',$data_antri->pasien)->count();

        $data = [
            'noAntrian' => $data_antri->antreana != null ? $data_antri->antreana : $data_antri->antreanb ,
            'tanggal' => $data_antri->tanggal,    
            'spesialis' => $data_antri->spesialis == 1 ? 'Umum' : 'Kejiwaan',         
            'kunjungan' => $kunjungan,
            'dokter'    => $data_antri->nama  
              ];
              $pdf = PDF::loadView('AdminPendaftaran.no_antrean', $data);
              return $pdf->stream($data_antri->tanggal."_".$data_antri->nama_pasien.'.pdf');
    }
}

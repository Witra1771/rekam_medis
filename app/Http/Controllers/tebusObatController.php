<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Dompdf\Dompdf;
use Session;
use Alert;
use App\Models;
use App\Models\Pemeriksaan;
use App\Models\tebus_obat;
use App\Models\resepObat;
use App\Models\Spesialis;
use App\Models\antrean;
use App\Models\Pasien;
use App\Models\User;
use App\Models\Obat;

class tebusObatController extends Controller
{
    
    public function index()
    {
        $Pasien         = pasien::all();
        $User           = User::all();
        $Obat           = Obat::all();
        $Antrean        = Antrean::all();
        $Spesialis      = Spesialis::all();
        $Pemeriksaan    = Pemeriksaan::all();
        $ResepObat      = resepObat::all();
        $lastId         = DB::table('pasien')->orderBy('foto_ktp', 'desc')->first();
        $lastIdTB       = DB::table('tebus_obat')->orderBy('id_tebus_obat', 'desc')->first();
        $User           = User::all()->whereNotNull('dokter_spesialis');
        $lastRO         = DB::table('resep_obat')->orderBy('id_RO', 'desc')->first();
        $Tobat          = DB::table('resep_obat')
                            ->leftJoin('obat', 'resep_obat.id_obat','=','obat.id_obat')
                            ->select('resep_obat.*', 'obat.*')
                            ->get();
        $tebusObat      = DB::table('pemeriksaan')
                            ->leftJoin('antrean', 'pemeriksaan.id_antrean','=','antrean.id_antrean')
                            ->leftJoin('pasien','pemeriksaan.id_pasien','=','pasien.id_pasien') 
                            ->select('pemeriksaan.*','antrean.*','pasien.*',)
                            ->get();
        $resepObat      = DB::table('resep_obat')
                            ->leftJoin('obat','resep_obat.id_obat','=','obat.id_obat')
                            ->get();

        
        $Pantrean       = DB::table('antrean')
                            ->leftJoin('pemeriksaan', 'antrean.id_pemeriksaan','=','pemeriksaan.id_pemeriksaan')
                            ->leftJoin('pemeriksaan_kejiwaan', 'antrean.id_pemeriksaan','=','pemeriksaan.id_pemeriksaan')
                            ->leftJoin('user', 'antrean.dokter','=','user.id_user')
                            ->leftJoin('spesialis', 'antrean.spesialis','=','spesialis.kode_spesialis')
                            ->leftJoin('pasien', 'antrean.pasien','=','pasien.nik')
                            ->select('antrean.*', 'pasien.*', 'user.nama', 'spesialis.spesialis_kedokteran', 'pemeriksaan.*')
                            ->get();

        if ($lastIdTB == null) {
            $IdTB = substr(date("Y").date("m").date("d"),2)."001";
        }else{
            $d      = substr($lastIdTB->id_tebus_obat,7);
            $count  = strlen(round($d));
            $id     = $d+1;
            $no     = '0'.$id;
            $IdTB   
            
            = substr(date("Y").date("m").date("d"),2)."0"  .$no;
            
        }
        if ($lastRO == null) {
            $IdRO = substr(date("Y").date("m").date("d"),2)."01";
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
        $data = [
            'Id'            => $Id,
            'IdTB'          => $IdTB,
            'IdRO'          => $IdRO,
            'pasien'        => $Pasien,
            'user'          => $User,
            'obat'          => $Obat,
            'Tobat'         => $Tobat,
            'tebusObat'     => $tebusObat,
            'resepObat'     => $resepObat,
            'antrean'       => $Antrean,    
            'Pantrean'      => $Pantrean,
            'spesialis'     => $Spesialis,
            'pemeriksaan'   => $Pemeriksaan,
            'resepObat'     => $ResepObat,
            'judul_antrean' => 'Antrean'
        ];
        // $pdf = PDF::load
        return view('Apoteker.tebus_obat')->with($data);
    }
    public function tambah(Request $request){
        $tebus_obat     = new tebus_obat();
        $id_tebus_obat  = $request->id_tebus_obat;
        $id_RO          = $request->idRO;
        $jumlah_beli    = $request->jumlah_beli;
        $sub_total      = $request->sub_total;

        
        $query = "INSERT INTO tebus_obat (id_tebus_obat, id_resep_obat, jumlah_beli, sub_total)
        VALUES ";
        $queryUpdate = "UPDATE resep_obat SET ";
        $struk = [];
        for ($i=0; $i < count($jumlah_beli); $i++) {
            $query .= "(".$id_tebus_obat.",'".$request->idRO."','".$jumlah_beli[$i]."','".$sub_total[$i]."'),";
            // ---------------------------------------
            $data = [
                "id_RO" => $request->id_resep_obat[$i],
                "id_obat" => $request->id_obat[$i] 
                ];
            $push = [$request->idRO[$i], $jumlah_beli[$i],$sub_total[$i]];
            array_push($struk, $push);
            $resep_obat = DB::table('resep_obat')
                ->select('*')
                ->where($data)
                ->get();
                foreach($resep_obat as $Res){
                    $jml = $Res->jumlah - $jumlah_beli[$i];
                }
            $queryUpdate .= "jumlah = ".$jml;
            $queryUpdate .= " WHERE id_RO = ".$request->id_resep_obat[$i]." And id_obat = ".$request->id_obat[$i];
            DB::statement($queryUpdate);

        }
        $query = substr($query,0, -1);
        $data = [
            'tebusObat'     => tebus_obat::all(),
            'obat'          => Obat::all(),
            'id_tebus_obat' => $id_tebus_obat
        ];
          
              $pdf = PDF::loadView('Apoteker.struk_obat', $data);
              return $pdf->stream(date("d-m-Y")."_".$request->id_tebus_obat.'.pdf');
              DB::statement($query);

        return redirect(url('/tebusObat'));
    }
    
    public function dataPasien()
    {
        $Pemeriksaan = Pemeriksaan::all();
        $ResepObat = resepObat::all();
        $lastId = DB::table('pasien')->orderBy('foto_ktp', 'desc')->first();
        $lastIdTB = DB::table('tebus_obat')->orderBy('id_tebus_obat', 'desc')->first();
        $User = User::all()->whereNotNull('dokter_spesialis');
        $lastRO = DB::table('resep_obat')->orderBy('id_RO', 'desc')->first();
        $Tobat = DB::table('resep_obat')
                    ->leftJoin('obat', 'resep_obat.id_obat','=','obat.id_obat')
                    ->select('resep_obat.*', 'obat.*')
                    ->get();
        $tebusObat = DB::table('pemeriksaan')
                        ->leftJoin('tebus_obat', 'pemeriksaan.id_RO','=','tebus_obat.id_resep_obat')
                        ->leftJoin('pasien','pemeriksaan.id_pasien','=','pasien.id_pasien') 
                        ->select('pemeriksaan.*','tebus_obat.*','pasien.*',)
                        ->get();
        $resepObat  = DB::table('resep_obat')
                        ->leftJoin('obat','resep_obat.id_obat','=','obat.id_obat')
                        ->get();

        
        $Pantrean = DB::table('antrean')
                    ->leftJoin('pemeriksaan', 'antrean.id_pemeriksaan','=','pemeriksaan.id_pemeriksaan')
                    ->leftJoin('pemeriksaan_kejiwaan', 'antrean.id_pemeriksaan','=','pemeriksaan.id_pemeriksaan')
                    ->leftJoin('user', 'antrean.dokter','=','user.id_user')
                    ->leftJoin('spesialis', 'antrean.spesialis','=','spesialis.kode_spesialis')
                    ->leftJoin('pasien', 'antrean.pasien','=','pasien.nik')
                    ->select('antrean.*', 'pasien.*', 'user.nama', 'spesialis.spesialis_kedokteran', 'pemeriksaan.*')
                    ->get();


        if ($lastIdTB == null) {
            $IdTB = substr(date("Y").date("m").date("d"),2)."001";
        }else{
            $d = substr($lastIdTB->id_tebus_obat,7);
            $count = strlen(round($d));
            $id = $d+1;
            
            $no = '0'.$id;
    
            $IdTB = substr(date("Y").date("m").date("d"),2)."0"  .$no;
    
        }
        if ($lastRO == null) {
            $IdRO = substr(date("Y").date("m").date("d"),2)."01";
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
        $data = [
            'Id'            => $Id,
            'IdTB'          => $IdTB,
            'IdRO'          => $IdRO,
            'user'          => $User,
            'Tobat'         => $Tobat,
            'tebusObat'     => $tebusObat,
            'resepObat'     => $resepObat,    
            'Pantrean'      => $Pantrean,
            'pemeriksaan'   => $Pemeriksaan,
            'resepObat'     => $ResepObat,
            'judul_antrean' => 'Antrean'
        ];
        // $pdf = PDF::load
        return view('Apoteker.data_pasien')->with($data);
    }
}

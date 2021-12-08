<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Dompdf\Dompdf;
use Session;
use Alert;
use App\Models\Spesialis;
use App\Models\pemeriksaan;
use App\Models\pemeriksaan_umum;
use App\Models\pemeriksaan_kejiwaan;
use App\Models\antrean;
use App\Models\Pasien;
use App\Models\Obat;
use App\Models\User;
use Illuminate\Http\Request;

class pendaftaranController extends Controller
{
    public function index()
    {
        $Pasien = pasien::all();
        $Obat = obat::all();
        $User = User::all();
        $Antrean = Antrean::all();
        $Spesialis = Spesialis::all();
        $lastId = DB::table('pasien')->orderBy('foto_ktp', 'desc')->first();
        $lastIdP = DB::table('pemeriksaan_kejiwaan')->orderBy('id_pemeriksaan', 'desc')->first();
        $pemeriksaan = pemeriksaan::all();
        $kunjungan_umum = pemeriksaan_umum::all();
        $kunjungan_kejiwaan = pemeriksaan_kejiwaan::all();
        $lastAntrean = DB::table('antrean')->orderBy('tanggal', 'desc')->first();
        $TPasien = DB::table('pasien')
        ->leftJoin('antrean', 'pasien.nik','=','antrean.pasien')
        ->select('pasien.*', 'antrean.Status')
        ->groupBy('pasien.nik')
        ->get();
        $User = User::all()->whereNotNull('dokter_spesialis');
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
    
        }if ($lastIdP == null) {
            $IdP = substr(date("Y").date("m").date("d"),2)."001";
        }else{
            $d = substr($lastIdP->id_pemeriksaan,7);
            $count = strlen(round($d));
            $id = $d+1;
            
            $no = '0'.$id;
    
            $IdP = substr(date("Y").date("m").date("d"),2)."0".$no;
    
        }
        $data = [
            'Id'                    => $Id,
            'IdP'                   => $IdP,
            'pasien'                => $Pasien,
            'Tpasien'               => $TPasien,
            'obat'                  => $Obat,
            'user'                  => $User,
            'pemeriksaan'           => $pemeriksaan,
            'kunjungan_umum'        => $kunjungan_umum,
            'kunjungan_kejiwaan'    => $kunjungan_kejiwaan,
            'antrean'               => $Antrean,
            'lantrean'              => $lastAntrean,
            'spesialis'             => $Spesialis,
            'judul_antrean'         => 'Antrean'
        ];
        // $pdf = PDF::load
        return view('AdminPendaftaran.pendaftaran')->with($data);
    }
    public function no_antrean(){
        $domPdf = new Dompdf();
        $data = [
            'title' => 'First PDF for Medium',
            'noAntrian' => 'A01',
            'tanggal' => '11 11 2021',    
            'spesialis' => 'Kejiwaan',     
            'kunjungan' => '02'        
              ];
              $pdf = PDF::loadView('AdminPendaftaran.no_antrean', $data);
            //   return view('AdminPendaftaran.no_antrean', $data);
              return $pdf->stream('invoice.pdf');
    }
    public function tambah(Request $request){
        $Pasien     = pasien::all();
        $nik        = DB::table('antrean')->where('pasien',$request->nik)->count();
        $lastktp    = DB::table('pasien')->orderBy('foto_pasien', 'desc')->first();
        $ktpName    = explode(".", @$lastktp->foto_pasien);
        if ($ktpName == null) {
            $idktp      = substr(date("Y").date("mm"),2)."01";
            $idpasien   = substr(date("Y").date("mm"),2)."02";
        }else{
            $d = substr($ktpName[0],7);
            $idktp      = '0'.$d+1;
            $idpasien   = '0'.$d+2;
    
            $idktp      = substr(date("Y").date("m").date("d"),2)."0".$idktp;
            $idpasien   = substr(date("Y").date("m").date("d"),2)."0".$idpasien;
        }
        $this->validate($request, [
			'foto_ktp'      => 'required',
			'foto_pasien'   => 'required',
		]);

        $foto_ktp       = $request->file('foto_ktp');
        $foto_pasien    = $request->file('foto_pasien');
        $ktpext         = $foto_ktp->getClientOriginalExtension();
        $pasienext      = $foto_pasien->getClientOriginalExtension();
        $ftkp           = $foto_ktp->getClientOriginalName();
        $fpasien        = $foto_pasien->getClientOriginalName();
        $data                   = new Pasien();
        $data->id_pasien        = $request->id_pasien;
        $data->nik              = $request->nik;
        $data->nama_pasien      = $request->nama_pasien;
        $data->tempat_lahir     = $request->tempat_lahir;
        $data->tanggal_lahir    = $request->tanggal_lahir;
        $data->jk               = $request->jk;
        $data->pekerjaan        = $request->pekerjaan;
        $data->alamat           = $request->alamat;
        $data->nohp             = $request->nohp;
        $data->status_perkawinan= $request->status_perkawinan;
        $data->foto_ktp         = $idktp.".".$ktpext;
        $data->foto_pasien      = $idpasien.".".$pasienext;
        $data->save();

        $lastantrean    = DB::table('antrean')->orderBy('id_antrean', 'desc')->first();
        $antreanA       = DB::table('antrean')->orderBy('antreana', 'desc')->first();
        $antreanB       = DB::table('antrean')->orderBy('antreanb', 'desc')->first();
        // $lastNo         = substr($lastantrean->n_antrean,1);
        // $lastKode       = substr($lastantrean->nomor_antrean,0,1);

        if ($lastantrean == null) { $Id = substr(date("Y").date("mm"),2)."01";
        }else{
            $d  = substr($lastantrean->id_antrean,7);
            $d+=1;
            $no = '0'.$d;
            $Id = substr(date("Y").date("m").date("d"),2).$no;
    
        }
        $antrean    = new Antrean();
        print_r($antreanA);
        $last       = @$antreanA->antreana;

        $antrean->id_antrean    = $Id;
        if ($request->spesialis == "1") {
            
            $dokter = Spesialis::find($request->spesialis);
            $spesdok = $dokter->spesialis_kedokteran;
            if (@$antreanA->antreana == "") { $noAntrean = "A01";
            }else{
                $last = substr($antreanA->antreana,2);
                $last+=1;
                $noAntrean = "A0".$last;
            }
            $antrean->antreana = $noAntrean;
            $antrean->antreanb = null;
        }
        if ($request->spesialis == "2") {
            $dokter = Spesialis::find($request->spesialis);
            $spesdok = $dokter->spesialis_kedokteran;
            if (@$antreanB->antreanb == Null) { $noAntrean = "B01";
            }else{
                $last = substr($antreanB->antreanb,2);
                $last+=1;
                $noAntrean = "B0".$last;
            }
            $antrean->antreana = null;
            $antrean->antreanb = $noAntrean;
        }
        $antrean->id_pemeriksaan   = null;
        $antrean->dokter    = $request->nama_dokter;
        $antrean->spesialis = $request->spesialis;
        $antrean->pasien    = $request->nik;
        $antrean->tanggal   = date("Y-m-d");
        $antrean->save();
        
		$foto_ktp->move('img', $data->foto_ktp );
		$foto_pasien->move('img', $data->foto_pasien);
        echo $foto_pasien->getClientOriginalName();
        Alert::success('Data '.$request->nama_pasien." berhasil disimpan");

        $pemeriksaan = pemeriksaan::find($request->id_pasien);
        $nik        = DB::table('pemeriksaan')->where('id_pasien',$request->d_pasien)->count();

      
        $data = [
            'noAntrian' => $noAntrean,
            'tanggal' => date("d-m-Y"),    
            'spesialis' => $spesdok,         
            'kunjungan' => $nik+1,
            'dokter'    => $request->nama_dokter  
              ];
              $pdf = PDF::loadView('AdminPendaftaran.no_antrean', $data);
              return $pdf->stream(date("d-m-Y")."_".$request->nama_pasien.'.pdf');
        // return redirect(url('/pendaftaran'));
    }
    public function ubah(Request $request, $id_pasien){
        $lastktp    = DB::table('pasien')->orderBy('foto_pasien', 'desc')->first();
        $ktpName    = explode(".", @$lastktp->foto_pasien);
        if ($ktpName == null) {
            $idktp      = substr(date("Y").date("mm"),2)."01";
            $idpasien   = substr(date("Y").date("mm"),2)."02";
        }else{
            $d = substr($ktpName[0],7);
            $idktp      = '0'.$d+1;
            $idpasien   = '0'.$d+2;
    
            $idktp      = substr(date("Y").date("m").date("d"),2)."0".$idktp;
            $idpasien   = substr(date("Y").date("m").date("d"),2)."0".$idpasien;
        }
        $this->validate($request, [
			'foto_ktp'      => 'required',
			'foto_pasien'   => 'required',
		]);

        $foto_ktp       = $request->file('foto_ktp');
        $foto_pasien    = $request->file('foto_pasien');
        
        $data = Pasien::find($id_pasien);
        $data->nik              = $request->nik;
        $data->nama_pasien      = $request->nama_pasien;
        $data->tempat_lahir     = $request->tempat_lahir;
        $data->tanggal_lahir    = $request->tanggal_lahir;
        $data->jk               = $request->jk;
        $data->pekerjaan        = $request->pekerjaan;
        $data->alamat           = $request->alamat;
        $data->nohp             = $request->nohp;
        $data->status_perkawinan= $request->status_perkawinan;
        if ($foto_ktp == null || $foto_ktp == "") {
            $data->foto_ktp    = $request->foto_ktp;
        }else{
            $ktpext         = $foto_ktp->getClientOriginalExtension();
            $ftkp           = $foto_ktp->getClientOriginalName();
            $data->foto_ktp         = $idktp.".".$ktpext;
            $foto_ktp->move('img', $data->foto_ktp );
        }
        if ($foto_pasien == null || $foto_pasien == "") {
            $data->foto_pasien     = $request->foto_pasien;
        }else{
            $pasienext      = $foto_pasien->getClientOriginalExtension();
            $fpasien        = $foto_pasien->getClientOriginalName();
            $data->foto_pasien        = $idpasien.".".$ktpext;
            $foto_pasien->move('img', $data->foto_pasien);
        }
        $data->update();
        
        Alert::success('Data '.$request->nama_pasien." berhasil disimpan");
        return redirect(url('/pendaftaran'));
    }
    public function daftar(Request $request){
        
        $lastantrean    = DB::table('antrean')->orderBy('id_antrean', 'desc')->first();
        $antreanA       = DB::table('antrean')->orderBy('antreana', 'desc')->first();
        $antreanB       = DB::table('antrean')->orderBy('antreanb', 'desc')->first();
        // $lastNo         = substr($lastantrean->n_antrean,1);
        // $lastKode       = substr($lastantrean->nomor_antrean,0,1);

        if ($lastantrean == null) { $Id = date("Y").date("mm")."01";
            echo $Id;
        }else{
            $d  = substr($lastantrean->id_antrean,8);

            
            echo $lastantrean->id_antrean;
            // $d+=1;
            $no = '0'.$d;
            $Id = date("Y").date("m").date("d").$no;
    
        }
        $antrean    = new Antrean();
        $last       = @$antreanA->antreana;

        $antrean->id_antrean    = $Id;
        if ($request->spesialis == "1") {
            
            $dokter = Spesialis::find($request->spesialis);
            $spesdok = $dokter->spesialis_kedokteran;
            if (@$antreanA->antreana == "") { $noAntrean = "A01";
            }else{
                $last = substr($antreanA->antreana,2);
                $last+=1;
                $noAntrean = "A0".$last;
            }
            $antrean->antreana = $noAntrean;
            $antrean->antreanb = null;
        }
        if ($request->spesialis == "2") {
            $dokter = Spesialis::find($request->spesialis);
            $spesdok = $dokter->spesialis_kedokteran;
            if (@$antreanB->antreanb == Null) { $noAntrean = "B01";
            }else{
                $last = substr($antreanB->antreanb,2);
                $last+=1;
                $noAntrean = "B0".$last;
            }
            $antrean->antreana = null;
            $antrean->antreanb = $noAntrean;
        }
        $antrean->dokter    = $request->nama_dokter;
        $antrean->spesialis = $request->spesialis;
        $antrean->pasien    = $request->nik;
        $antrean->tanggal   = date("Y-m-d");
        $antrean->save();
        
        return redirect(url('/pendaftaran'));
    }
    public function hapus(Request $request, $id_pasien){
        $data = new Pasien();
        $pasien = Pasien::find($id_pasien);
        $pasien->delete();

        Alert::success('Data '.$data->nama_pasien." berhasil dihapus");
        return redirect(url('/pendaftaran'));
    }

}

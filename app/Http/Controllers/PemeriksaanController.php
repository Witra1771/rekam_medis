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
use App\Models\Pemeriksaan_pasien;
use App\Models\Pemeriksaan_umum;
use App\Models\Pemeriksaan_kejiwaan;
use App\Models\Pemeriksaan_fisik;
use App\Models\Pemeriksaan_psikiatrik;
use App\Models\Pemeriksaan_tambahan;
use App\Models\penggunaan_narkotika;
use App\Models\rawat_inap;
use App\Models\riwayat_keluarga;
use App\Models\status_legal;
use App\Models\status_medis;
use App\Models\status_pekerjaan;
use App\Models\status_psikiatris;
use App\Models\detil_pemeriksaan_jiwa;
use App\Models\resepObat;
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
        $Pemeriksaan = Pemeriksaan::all();
        $ResepObat = resepObat::all();
        $lastId = DB::table('pasien')->orderBy('foto_ktp', 'desc')->first();
        $lastIdP = DB::table('pemeriksaan')->orderBy('id_pemeriksaan', 'desc')->first();
        $lastIdPU = DB::table('pemeriksaan_umum')->orderBy('id_pemeriksaan', 'desc')->first();
        $User = User::all()->whereNotNull('dokter_spesialis');
        $lastRO = DB::table('resep_obat')->orderBy('id_RO', 'desc')->first();
        
        $Tantrean = DB::table('antrean')
                    ->leftJoin('user', 'antrean.dokter','=','user.id_user')
                    ->leftJoin('spesialis', 'antrean.spesialis','=','spesialis.kode_spesialis')
                    ->leftJoin('pasien', 'antrean.pasien','=','pasien.nik')
                    ->leftJoin('pemeriksaan', 'antrean.id_antrean','=','pemeriksaan.id_antrean')
                    ->select('antrean.*', 'user.nama', 'pasien.*', 'spesialis.spesialis_kedokteran', 'pemeriksaan.*')
                    ->get();
        $Pantrean = DB::table('antrean')
                    ->leftJoin('user', 'antrean.dokter','=','user.id_user')
                    ->leftJoin('spesialis', 'antrean.spesialis','=','spesialis.kode_spesialis')
                    ->leftJoin('pasien', 'antrean.pasien','=','pasien.nik')
                    ->select('antrean.*', 'pasien.*', 'user.nama', 'spesialis.*')
                    ->get();

        if ($lastIdP == null) {
            $IdP = substr(date("Y").date("m").date("d"),2)."001";
        }else{
            $d = substr($lastIdP->id_pemeriksaan,7);
            $count = strlen(round($d));
            $id = $d+1;
            
            $no = '0'.$id;
    
            $IdP = substr(date("Y").date("m").date("d"),2)."0"  .$no;
    
        }
        if ($lastIdPU == null) {
            $IdPU = substr(date("Y").date("m").date("d"),2)."001";
        }else{
            $d = substr($lastIdPU->id_pemeriksaan,7);
            $count = strlen(round($d));
            $id = $d+1;
            
            $no = '0'.$id;
    
            $IdPU = substr(date("Y").date("m").date("d"),2)."0"  .$no;
    
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
            'Id'        => $Id,
            'IdP'        => $IdP,
            'IdPU'        => $IdPU,
            'IdRO'        => $IdRO,
            'pasien'    => $Pasien,
            'user'      => $User,
            'obat'      => $Obat,
            'antrean'      => $Antrean,
            'Tantrean'      => $Tantrean,
            'Pantrean'      => $Pantrean,
            'spesialis'      => $Spesialis,
            'pemeriksaan'      => $Pemeriksaan,
            'resepObat'      => $ResepObat,
            'judul_antrean' => 'Antrean'
        ];
        // $pdf = PDF::load
        return view('Dokter.Pemeriksaan')->with($data);
    }
    public function dataPasien()
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
        $Pantrean = DB::table('antrean')
                    ->leftJoin('pasien', 'antrean.pasien','=','pasien.nik')
                    ->select('antrean.*', 'pasien.*')
                    ->get();
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
            'Id'        => $Id,
            'IdP'        => $IdP,
            'IdRO'        => $IdRO,
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
    
    public function tambah(Request $request){
        // $Pasien = new Pasien();
        // $Pasien        = DB::table('pasien')->where('id_pasien',$request->id_pasien);
        $Pasien = Pasien::find($request->id_pasien);
        $antrean = Antrean::find($request->id_antrean);
        $umum = new pemeriksaan_umum();
        // \DB::table('pasien')->where('id_pasien',$request->id_pasien)->count();
        $umum->id_pemeriksaan        = $request->idPU;
        $umum->tekanan_darah     = $request->tekanan_darah;
        $umum->suhu              = $request->suhu;
        $umum->test_urine        = $request->test_urine;
        $umum->keluhan           = $request->keluhan;
        $umum->diagnosis         = $request->diagnosis;
        $umum->biaya_pemeriksaan         = $request->biaya_pemeriksaan;

        $pemeriksaan = new pemeriksaan();
        $pemeriksaan->id_pemeriksaan        = $request->idP;
        $pemeriksaan->id_antrean            = $request->id_antrean;
        $pemeriksaan->id_pasien             = $request->id_pasien;
        $pemeriksaan->id_RO                 = $request->idRO;
        $pemeriksaan->jenis_konsultasi   = $request->kode_spesialis;
        $pemeriksaan->biaya_pemeriksaan     = $request->biaya_pemeriksaan;

        //Resep Obat
        $RO = new resepObat();
        $obat = $request->obat;
        // $dosis = $request->dosis;
        $aturan_pakai = $request->aturan_pakai;
        $jumlah = $request->jumlah;
        array_shift($obat);
        // array_shift($dosis);
        array_shift($aturan_pakai);
        array_shift($jumlah);
        var_dump($request->obat);
        
        $data = [];
        $data1 = [];
        $query = "INSERT INTO resep_obat (id_RO, id_obat, aturan_pakai, jumlah)
        VALUES ";
        for ($i=0; $i < count($request->obat); $i++) {
            $query .= "(".$request->idRO.",".$request->obat[$i].",'".$aturan_pakai[$i]."','".$jumlah[$i]."'),";
            // $query = ;
            // array_push($data, [
            //             $request->idRO,
            //             $obat[$i],
            //             $dosis[$i],
            //             $aturan_pakai[$i],
            //             $jumlah[$i]
            //         ]);
        }
            $query = substr($query,0, -1);
            
        $antrean->Status            = "Selesai";
        $antrean->id_pemeriksaan    = $request->idP;

        $umum->save();
        $pemeriksaan->save();
        DB::statement($query);
        $antrean->update();
        
        $Fantrean = DB::table('antrean')->where('id_antrean',$request->id_antrean)
                ->leftJoin('user', 'antrean.dokter','=','user.id_user')
                ->leftJoin('spesialis', 'antrean.spesialis','=','spesialis.kode_spesialis')
                ->select('antrean.*', 'user.nama','spesialis.spesialis_kedokteran') 
                ->get();
        foreach($Fantrean as $fa){
            if($fa->id_antrean == $request->id_antrean){
                $data = [
                    'tanggal' => date("d-m-Y"), 
                    'dokter' => $fa->nama,
                    'spesialis' => $fa->spesialis_kedokteran,
                    'biaya'     => $request->biaya_pemeriksaan 
                      ];
            }
        }
              $pdf = PDF::loadView('Dokter.struk_pemeriksaan', $data);
              return $pdf->stream(date("d-m-Y")."_".$data['spesialis'].'.pdf');
        // Alert::success('Data '.$Pasien->nama_pasien." berhasil disimpan");
        return redirect(url('/pemeriksaan'));
    }
    public function tambahJiwa1(Request $request){
        $pemeriksaan = new Pemeriksaan_pasien();

    }
    public function tambahJiwa(Request $request){
        // $Pasien = new Pasien();
        // $Pasien        = DB::table('pasien')->where('id_pasien',$request->id_pasien);
        $Pasien = Pasien::find($request->id_pasien);
        // \DB::table('pasien')->where('id_pasien',$request->id_pasien)->count();
        $pemeriksaan = new Pemeriksaan_kejiwaan();
        $pemeriksaan->id_pemeriksaan        = $request->idP;
        $pemeriksaan->id_antrean            = $request->id_antrean;
        $pemeriksaan->id_pem_fisik          = "PF".$request->idP;
        $pemeriksaan->id_pem_psik           = "PP".$request->idP;
        $pemeriksaan->id_pem_tambahan       = "PT".$request->idP;
        $pemeriksaan->id_status_medis       = "SM".$request->idP;
        $pemeriksaan->id_rawat_inap         = "RI".$request->idP;
        $pemeriksaan->id_status_pekerjaan   = "SPK".$request->idP;
        $pemeriksaan->id_jenis_penyakit     = "JP".$request->idP;
        $pemeriksaan->id_pgnn_narkoba       = "PGN".$request->idP;
        $pemeriksaan->id_status_legal       = "SL".$request->idP;
        $pemeriksaan->id_riwayat_keluarga   = "RK".$request->idP;
        $pemeriksaan->id_status_psikiatris  = "SPS".$request->idP;
        $pemeriksaan->id_RO                 = $request->idRO;
        
        // $DP = new detil_pemeriksaan_jiwa();
        // $DP->id_detil_pemeriksaan = $request->idP;
        // $DP->id_pem_fisik           = $request->idP;
        
        $PF = new pemeriksaan_fisik();
        $PF->id_pem_fisik   = "PF".$request->idP;
        $PF->T              = $request->T;
        $PF->N              = $request->N;
        $PF->RR             = $request->RR;
        $PF->SB             = $request->SB;
        $PF->penampilan     = $request->penampilan;
        $PF->cara_berjalan  = $request->cara_berjalan;
        $PF->cara_bicara    = $request->cara_bicara;
        $PF->konjungtiva    = $request->konjungtiva;
        $PF->bekas_suntikan = $request->bekas_suntikan;
        $PF->tremor         = $request->tremor;
        
        $PP = new pemeriksaan_psikiatrik();
        $PP->id_pem_psik    = "PP".$request->idP;
        $PP->pembicaraan    = $request->alur_pembicaraan;
        $PP->waham          = $request->waham;
        $PP->halusinasi     = $request->halusinasi;
        $PP->akustik        = $request->akustik;
        $PP->visual         = $request->visual;
        $PP->lain_lain      = $request->psik_lain;
        
        $PT = new pemeriksaan_tambahan();
        $PT->id_pem_tambahan    = "PT".$request->idP;
        $PT->benzodiazepine     = $request->benzodiazepine;
        $PT->cocaine            = $request->cocaine;
        $PT->amphetamin         = $request->amphetamin;
        $PT->cthc_marijuana     = $request->cthc_marijuana;
        $PT->methaphetamine     = $request->methaphetamine;
        $PT->morphin            = $request->morphin;

        $SM = new status_medis();
        $SM->id_status_medis        = "SM".$request->idP;
        $SM->id_jenis_penyakit      = "JP".$request->idP;
        $SM->riwayat_p_kronis       = $request->id_rawat;
        $SM->riwayat_jenis_penyakit = $request->jenis_riwayat_penyakit;
        $SM->terapi_medis           = $request->terapi_medis;
        $SM->hiv                    = $request->hiv;
        $SM->hepatitisb             = $request->hepatitisb;
        $SM->hepatitisc             = $request->hepatitisc;

        
        $idRI = "RI".$request->idP;
        if($request->jp != "" || $request->jp !== null){
            $jp = $request->sm_jenis_penyakit;
            $dari = $request->dari;
            $sampai = $request->sampai;
            
            $query = "INSERT INTO rawat_inap (id_rawat_inap, jenis_penyakit, dari, sampai)
            VALUES ";
            for ($i=0; $i < count(@$jp); $i++) {
                $query .= "('RI".$request->idP."','".$jp[$i]."','".$dari[$i]."','".$sampai[$i]."'),";
            }
                $query = substr($query,0, -1);
                echo $query;
            DB::statement($query);
        }

        $SPk = new status_pekerjaan();
        $SPk->id_stt_pekerjaan       = $request->idP;
        $SPk->id_pasien              = $request->id_pasien;
        $SPk->pola_pekerjaan         = $request->pola_pekerjaan;
        $SPk->kode_pekerjaan         = $request->kode_pekerjaan;
        $SPk->keterampilan_teknis    = $request->keterampilan_teknis;
        $SPk->dukungan_hidup         = $request->dukungan_hidup;
        $SPk->pemberi_dukungan       = $request->pemberi_dukungan;
        $SPk->finansial              = $request->finansial;
        $SPk->tempat_tinggal         = $request->tempat_tinggal;
        $SPk->makan                  = $request->makan;
        $SPk->pgbtn_prwtn            = $request->pngbtn_prwtn;
        $SPk->rwyt_pnykt_kronis      = $request->pnykt_kronis;
        $SPk->jenis_penyakit         = $request->SPk_jenis_penyakit;
        $SPk->terapi_medis           = $request->terapi_medis;
        $SPk->jenis_terapi           = $request->SPk_jenis_terapi;
        
        $SPN = new penggunaan_narkotika();
        $SPN->id_pgnn_narkotika = $request->idP;
        $SPN->alkohol           = $request->Alkohol;
        $SPN->analgesik         = $request->Analgesik;
        $SPN->kokain            = $request->Kokain;
        $SPN->halusinogen       = $request->Halusinogen;
        $SPN->heroin            = $request->Heroin;
        $SPN->barbibutat        = $request->Barbibutat;
        $SPN->amfetamin         = $request->Amfetamin;
        $SPN->inhalan           = $request->Inhalan;
        $SPN->metadon           = $request->Metadon;
        $SPN->sedaptif_hipnotik = $request->SedaHip;
        $SPN->kanabis           = $request->Kanabis;
        $SPN->empat_zat         = $request->empat_zat;
        $SPN->zat_lain_isi      = $request->zat_lain_isi;
        $SPN->zat_lain          = $request->zat_lain;
        
        $SL = new status_legal();
        $SL->id_status_legal        = $request->idP;
        $SL->mencuri_vandalisme     = $request->mnc;
        $SL->pemalsuan              = $request->pmls;
        $SL->perampokan             = $request->prm;
        $SL->pemerkosaan            = $request->pmrk;
        $SL->melecehkan_pengadilan  = $request->pnbs;
        $SL->pbb_mp                 = $request->pbbmp;
        $SL->penyerangan_bersenjata = $request->pnbs;
        $SL->penyerangan            = $request->pnr;
        $SL->pembunuhan             = $request->pbn;
        $SL->masalah_narkoba        = $request->mn;
        $SL->pembobolan_pencurian   = $request->pbpn;
        $SL->pembakaran_rumah       = $request->pr;
        $SL->pelacuran              = $request->plc;
        $SL->SL_lain_isi            = $request->SL_lain_isi;
        $SL->SL_lain                = $request->SL_lain;
        
        $SPsik = new status_psikiatris();
        $SPsik->id_status_psikiatris    = $request->idP;
        $SPsik->depresi_serius          = $request->C1;
        $SPsik->halusinasi              = $request->C2;
        $SPsik->perilaku_kasar          = $request->C3;
        $SPsik->berusaha_bundir         = $request->C4;
        $SPsik->cemas_gelisah           = $request->C5;
        $SPsik->sulit_mengingat         = $request->C6;
        $SPsik->pikiran_utk_bundir      = $request->C7;
        $SPsik->menerima_pengobatan     = $request->C8;
        
        $pemeriksaan->save();
        // $P->save();
        // $DP->save();
        $PF->save();
        $PP->save();
        $PT->save();
        $SM->save();
        $SPk->save();
        $SPN->save();
        $SL->save();
        // $RK->save();
        $SPsik->save();



        //Resep Obat
        
        $RO = new resepObat();
        $obat = $request->obat;
        // $dosis = $request->dosis;
        $aturan_pakai = $request->aturan_pakai;
        $jumlah = $request->jumlah;
        array_shift($obat);
        // array_shift($dosis);
        array_shift($aturan_pakai);
        array_shift($jumlah);
        var_dump($request->obat);
        
        $data = [];
        $data1 = [];
        $query = "INSERT INTO resep_obat (id_RO, id_obat, aturan_pakai, jumlah)
        VALUES ";
        for ($i=0; $i < count($request->obat); $i++) {
            $query .= "(".$request->idRO.",".$request->obat[$i].",'".$aturan_pakai[$i]."','".$jumlah[$i]."'),";
            // $query = ;
            // array_push($data, [
            //             $request->idRO,
            //             $obat[$i],
            //             $dosis[$i],
            //             $aturan_pakai[$i],
            //             $jumlah[$i]
            //         ]);
        }
            $query = substr($query,0, -1);
        DB::statement($query);

        $antrean = Antrean::find($request->id_antrean);
        $antrean->id_pemeriksaan        = $request->idP;
        $antrean->Status    = "Selesai";
        $antrean->update();
        
        Alert::success('Data '.$Pasien->nama_pasien." berhasil disimpan");
        $nik        = DB::table('pemeriksaan')->where('id_pasien',$request->d_pasien)->count();

        $Fantrean = DB::table('antrean')->where('id_antrean',$request->id_antrean)
                ->leftJoin('user', 'antrean.dokter','=','user.id_user')
                ->leftJoin('spesialis', 'antrean.spesialis','=','spesialis.kode_spesialis')
                ->select('antrean.*', 'user.nama','spesialis.spesialis_kedokteran') 
                ->get();
        foreach($Fantrean as $fa){
            if($fa->id_antrean == $request->id_antrean){
                $data = [
                    'tanggal' => date("d-m-Y"), 
                    'dokter' => $fa->nama,
                    'spesialis' => $fa->spesialis_kedokteran,
                    'biaya'     => $request->biaya_pemeriksaan 
                      ];
            }
        }
              $pdf = PDF::loadView('Dokter.struk_pemeriksaan', $data);
              return $pdf->stream(date("d-m-Y")."_".$data['spesialis'].'.pdf');
              return redirect(url('/pemeriksaan'));
    }
    public function form_pemeriksaan($id_antrean)
    {
        $Fantrean = DB::table('antrean')->where('id_antrean', $id_antrean)
        ->leftJoin('pasien', 'antrean.pasien','=','pasien.nik')
        ->select('antrean.*', 'pasien.*')
        ->get();
        $Pasien = pasien::all();
        $User = User::all();
        $Obat = Obat::all();
        $Antrean = Antrean::all();
        $Spesialis = Spesialis::all();
        $Pemeriksaan = Pemeriksaan::all();
        $ResepObat = resepObat::all();
        $lastId = DB::table('pasien')->orderBy('foto_ktp', 'desc')->first();
        $lastIdP = DB::table('pemeriksaan_kejiwaan')->orderBy('id_pemeriksaan', 'desc')->first();
        $User = User::all()->whereNotNull('dokter_spesialis');
        $lastRO = DB::table('resep_obat')->orderBy('id_RO', 'desc')->first();
        
        $Tantrean = DB::table('antrean')
                    ->leftJoin('user', 'antrean.dokter','=','user.id_user')
                    ->leftJoin('spesialis', 'antrean.spesialis','=','spesialis.kode_spesialis')
                    ->leftJoin('pasien', 'antrean.pasien','=','pasien.nik')
                    ->leftJoin('pemeriksaan', 'antrean.id_antrean','=','pemeriksaan.id_antrean')
                    ->select('antrean.*', 'user.nama', 'pasien.*', 'spesialis.spesialis_kedokteran', 'pemeriksaan.*')
                    ->get();
        $Pantrean = DB::table('antrean')
                    ->leftJoin('user', 'antrean.dokter','=','user.id_user')
                    ->leftJoin('spesialis', 'antrean.spesialis','=','spesialis.kode_spesialis')
                    ->leftJoin('pasien', 'antrean.pasien','=','pasien.nik')
                    ->select('antrean.*', 'pasien.*', 'user.nama', 'spesialis.spesialis_kedokteran')
                    ->get();

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
            'Id'        => $Id,
            'IdP'        => $IdP,
            'IdRO'        => $IdRO,
            'pasien'    => $Pasien,
            'user'      => $User,
            'obat'      => $Obat,
            'antrean'      => $Antrean,
            'Fantrean'      => $Fantrean,
            'Tantrean'      => $Tantrean,
            'Pantrean'      => $Pantrean,
            'spesialis'      => $Spesialis,
            'pemeriksaan'      => $Pemeriksaan,
            'resepObat'      => $ResepObat,
            'judul_antrean' => 'Antrean'
        ];
        // $pdf = PDF::load
        return view('Dokter.form_pemeriksaan')->with($data);
    }
}

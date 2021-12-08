<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use App\Models\obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obat = obat::all();
        $lastId = DB::table('obat')->orderBy('id_obat', 'desc')->first();
        $d = substr(@$lastId->id_obat,9);
        $count = strlen(round($d));
        $id = $d+1;
        if ($count == 1) {
            $no = '000'.$id;
        }
        elseif ($count == 2) {
            $no = '00'.$id;
        }
        elseif ($count == 3) {
            $no = '0'.$id;
        }

        $Id = date("mm").substr(date("Y"),2).$no;

        $data = [
            'Id' => $Id,
            'obat' => $obat
        ];
        return view('AdminApotek.kelola_obat')->with($data);
    }
    public function getObat(){
        return DB::table('obat')->order_by('id_obat', 'desc')->first();
    }
    public function tambah(Request $request){
        $obat = new Obat();
        $obat->id_obat      = $request->id_obat;
        $obat->nama_obat    = $request->nama_obat;
        $obat->dosis        = $request->dosis;
        $obat->satuan       = $request->satuan;
        $obat->jenis_obat   = $request->jenis_obat;
        $obat->qty          = $request->qty;
        $obat->harga_beli   = $request->harga_beli;
        $obat->harga_jual   = $request->harga_jual;
        $obat->save();
        
        Alert::success('Data '.$request->nama_obat." berhasil disimpan");
        return redirect(url('/kelola_obat'));
    }
    public function ubah(Request $request, $id_obat){
        $obat = Obat::find($id_obat);
        $obat->nama_obat    = $request->nama_obat;
        $obat->satuan       = $request->satuan;
        $obat->jenis_obat   = $request->jenis_obat;
        $obat->qty          = $request->qty;
        $obat->harga_beli   = $request->harga_beli;
        $obat->harga_jual   = $request->harga_jual;
        $obat->update();
        
        
        Alert::success('Data '.$request->nama_obat." berhasil disimpan");
        return redirect(url('/kelola_obat'));
    }
    public function hapus(Request $request, $id_obat){
        $obat = new Obat();
        $obat = Obat::find($id_obat);
        $obat->delete();

        Alert::success('Data '.$obat->nama_obat." berhasil dihapus");
        return redirect(url('/kelola_obat'));
    }
}

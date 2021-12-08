<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $UserAll = User::all();
        $lastId = DB::table('user')->orderBy('id_user', 'desc')->first();
        $User = User::all()->whereNotNull('dokter_spesialis');
        if ($lastId == null) {
            $Id = substr(date("Y").date("mm"),2)."001";

            $data = [
                'Id' => $Id,
                'user' => $User
            ];
        }else{
            $d = substr($lastId->id_user,7);
            $count = strlen(round($d));
            $id = $d+1;
            
            $no = '0'.$id;
    
            $Id = substr(date("Y").date("m").date("d"),2)."0".$no;
    
        }
        $data = [
            'Id'        => $Id,
            'user'      => $UserAll,
        ];
        // $pdf = PDF::load
        return view('AdminApotek.kelola_user')->with($data);

        // $User = user::all();
        // return view('AdminApotek.kelola_user')->with("user", $User);
    }
    public function tambah(Request $request){
        
        $user = new User();
        $user->id_user          = $request->id_user;
        $user->nama             = $request->nama;
        $user->hak_akses        = $request->hak_akses;
        $user->username         = $request->username;
        $user->password         = Hash::make('12345678');
        $user->dokter_spesialis = $request->dokter_spesialis;
        $user->jk               = $request->jk;
        $user->tempat_lahir     = $request->tempat_lahir;
        $user->tanggal_lahir    = $request->tanggal_lahir;
        $user->alamat           = $request->alamat;
        $user->no_hp            = $request->no_hp;
        $user->save();
        
        Alert::success('Data '.$request->nama." berhasil disimpan");
        return redirect(url('/kelola_user'));
    }
    public function ubah(Request $request, $id_user){
        $user = User::find($id_user);
        $user->nama             = $request->nama;
        $user->hak_akses        = $request->hak_akses;
        $user->username         = $request->username;
        $user->password         = $request->password;
        $user->dokter_spesialis = $request->dokter_spesialis;
        $user->jk               = $request->jk;
        $user->tempat_lahir     = $request->tempat_lahir;
        $user->tanggal_lahir    = $request->tanggal_lahir;
        $user->alamat           = $request->alamat;
        $user->no_hp            = $request->no_hp;
        $user->update();
        
        Alert::success('Data '.$request->nama." berhasil disimpan");
        return redirect(url('/kelola_user'));

        
    }
    public function hapus(Request $request, $id_user){
        $data = new User();
        $user = User::find($id_user);
        $user->delete();

        Alert::success('Data '.$data->nama." berhasil Dihapus");
        return redirect(url('/kelola_user'));
    }
}

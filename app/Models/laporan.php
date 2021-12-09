<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;
    protected $table = "tebus_obat";
    protected $primaryKey = "id_tebus_obat";

    public function getTebusObat(){
        $tebusObat = DB::table('tebus_obat')->get();
        $dataTebusObat = [];
        if (count($tebusObat) > 0) {
            foreach($tebusObat as $to){
                $data = [
                    'id_tebus_obat' => $to->id_tebus_obat,
                    'id_resep_obat' => $to->id_resep_obat,
                    'id_obat'       => $to->id_obat,
                    'jumlah_beli'   => $to->jumlah_beli,
                    'sub_total'     => $to->sub_total
                ];
                array_push($dataTebusObat, $data);
            }
        }
        return $dataTebusObat;
    }
}

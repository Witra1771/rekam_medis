<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resepObat extends Model
{
    use HasFactory;
    protected $table = "resep_obat";
    protected $primaryKey = "id_RO";
    protected $fillable = [
        'id_obat',
        'dosis',
        'aturan_pakai',
        'jumlah',
];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemeriksaan_pasien extends Model
{
    use HasFactory;
    protected $table = "pemeriksaan_pasien";
    protected $primaryKey = "id_pemeriksaan";
}

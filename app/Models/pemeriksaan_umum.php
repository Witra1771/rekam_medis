<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemeriksaan_umum extends Model
{
    use HasFactory;
    protected $table = "pemeriksaan_umum";
    protected $primaryKey = "id_pemeriksaan";
}

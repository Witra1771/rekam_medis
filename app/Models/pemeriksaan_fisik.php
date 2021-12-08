<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemeriksaan_fisik extends Model
{
    use HasFactory;
    protected $table = "pemeriksaan_fisik";
    protected $primaryKey = "id_pem_fisik";
}

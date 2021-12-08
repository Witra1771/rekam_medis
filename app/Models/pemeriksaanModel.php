<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemeriksaanModle extends Model
{
    use HasFactory;
    protected $table = "pemeriksaan";
    protected $primaryKey = "id_pemeriksaan";
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemeriksaan_kejiwaan extends Model
{
    use HasFactory;
    protected $table = "pemeriksaan_kejiwaan";
    protected $primaryKey = "id_pemeriksaan";
}

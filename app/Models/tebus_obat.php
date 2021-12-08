<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tebus_obat extends Model
{
    use HasFactory;
    protected $table = "tebus_obat";
    protected $primaryKey = "id_tebus_obat";
}

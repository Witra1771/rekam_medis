<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use Dompdf\Dompdf;
use Session;
use Alert;
use App\Models;
use App\Models\Pemeriksaan;
use App\Models\Pemeriksaan_pasien;
use App\Models\Pemeriksaan_kejiwaan;
use App\Models\Pemeriksaan_fisik;
use App\Models\Pemeriksaan_psikiatrik;
use App\Models\Pemeriksaan_tambahan;
use App\Models\penggunaan_narkotika;
use App\Models\rawat_inap;
use App\Models\riwayat_keluarga;
use App\Models\status_legal;
use App\Models\status_medis;
use App\Models\status_pekerjaan;
use App\Models\status_psikiatris;
use App\Models\detil_pemeriksaan_jiwa;
use App\Models\resepObat;
use App\Models\Spesialis;
use App\Models\antrean;
use App\Models\Pasien;
use App\Models\User;
use App\Models\Obat;

class pemeriksaanPasienController extends Controller
{
    //
}

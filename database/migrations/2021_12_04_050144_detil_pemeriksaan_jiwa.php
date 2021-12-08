<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetilPemeriksaanJiwa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table detil_pemeriksaan_jiwa(
                id_pemeriksaan          varchar(15) not null primary key,
                id_pem_fisik            varchar(50) null,
                id_pem_psik             varchar(50) null,
                id_pem_tambahan         varchar(50) null,
                id_status_medis         varchar(50) null,
                id_rawat_inap           varchar(50) null,
                id_staus_pekerjaan      varchar(50) null,
                id_jenis_penyakit       varchar(50) null,
                id_pgnn_narkoba         varchar(50) null,
                id_status_legal         varchar(50) null,
                id_riwayat_keluarga     varchar(50) null,
                id_status_psikiatris    varchar(50) null,
                4zat_lebih              varchar(50) null,
                zat_lain                varchar(50) null,
                created_at              datetime not null, 
                updated_at              datetime not null  
            )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExist("detil_pemeriksaan_jiwa");
    }
}

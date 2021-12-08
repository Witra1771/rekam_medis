<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StatusPekerjaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table status_pekerjaan(
                id_stt_pekerjaan    varchar(15) not null,
                id_pasien           varchar(15) not null,
                pola_pekerjaan      varchar(50) null,
                kode_pekerjaan      varchar(50) null,
                keterampilan_teknis varchar(50) null,
                dukungan_hidup      varchar(50) null,
                pemberi_dukungan    varchar(50) null,
                finansial           varchar(50) null,
                tempat_tinggal      varchar(50) null,
                makan               varchar(50) null,
                pgbtn_prwtn         varchar(50) null,
                rwyt_pnykt_kronis   varchar(50) null,
                jenis_penyakit      varchar(50) null,
                terapi_medis        varchar(50) null,
                jenis_terapi        varchar(50) null,
                created_at          datetime not null, 
                updated_at          datetime not null  
            )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExist("status_pekerjaan");
    }
}

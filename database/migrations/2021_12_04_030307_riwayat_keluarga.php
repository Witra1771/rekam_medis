<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RiwayatKeluarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table riwayat_keluarga(
                id_riwayat_keluarga varchar(15) not null primary key,
                kondisi_hidup       varchar(50) null,
                hidup_dgn_pgn_zat   varchar(1) null,
                ayah_ibu            varchar(1) null,
                om_tante            varchar(1) null,
                teman               varchar(1) null,
                pasangan            varchar(1) null,
                lainya              varchar(1) null,
                knf_ibu             varchar(1) null,
                knf_adik_kakak      varchar(1) null,
                konf_pasangan       varchar(1) null,
                konf_anak           varchar(1) null,
                konf_kel_lain_isi   varchar(50) null,
                konf_kel_lain       varchar(1) null,
                konf_teman_akrab    varchar(1) null,
                konf_tetangga       varchar(1) null,
                konf_teman_kerja    varchar(1) null,
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
        Schema::dropIfExist("riwayat_keluarga");
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StatusPsikiatris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table status_psikiatris(
                id_riwayat_keluarga varchar(15) not null primary key,
                depseri_serius   varchar(1) null,
                halusinasi            varchar(1) null,
                perilaku_kasar            varchar(1) null,
                berusaha_bundir               varchar(1) null,
                cemas_gelisah            varchar(1) null,
                sulit_mengigat              varchar(1) null,
                pikiran_utk_bundir             varchar(1) null,
                menerima_pengbatan      varchar(1) null,
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
        Schema::dropIfExist("status_psikiatris");
    }
}

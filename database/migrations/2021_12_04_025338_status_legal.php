<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StatusLegal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table status_legal(
                id_status_legal         varchar(15) not null primary key,
                mencuri_vandalisme      varchar(50) null,
                pemalsuan               varchar(1) null,
                perampokan              varchar(1) null,
                pemerkosaan             varchar(1) null,
                melecehkan_pengadilan   varchar(1) null,
                pbb_mp                  varchar(1) null,
                penyerangan_bersenjata  varchar(1) null,
                penyerangan             varchar(1) null,
                pembunuhan              varchar(1) null,
                masalah_narkoba         varchar(1) null,
                pembobolan_pencurian    varchar(1) null,
                pembakaran_rumah        varchar(1) null,
                pelacuran               varchar(1) null,
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
        Schema::dropIfExist("status_legal");
    }
}

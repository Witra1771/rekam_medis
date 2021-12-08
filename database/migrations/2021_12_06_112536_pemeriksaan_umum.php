<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PemeriksaanUmum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table pemeriksaan_umum(
                id_pemeriksaan      varchar(16) not null primary key,
                tekanan_darah       varchar(3) not null,
                suhu                varchar(3) not null,
                test_urine          varchar(20) not null,
                keluhan             varchar(255) not null,
                diagnosis           varchar(25) not null,
                biaya_pemeriksaan   varchar(7) not null,
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
        DB::dropIfExist("pemeriksaan_umum");
    }
}

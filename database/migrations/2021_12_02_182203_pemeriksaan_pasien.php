<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PemeriksaanPasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table pemeriksaan_pasien(
                id_pemeriksaan      varchar(15) not null primary key,
                jenis_pemeriksaan    varchar(15) not null,
                created_at      datetime not null, 
                updated_at      datetime not null
            )
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExist("pemeriksaan_pasien");
    }
}

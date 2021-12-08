<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PemeriksaanPsikiatrik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table pemeriksaan_psikiatrik(
                id_pem_psik    varchar(15) not null primary key,
                pembicaraan    varchar(2) not null,
                waham          varchar(2) not null,
                halusinasi     varchar(2) not null,
                akustik        varchar(50) null,
                visual         varchar(50) null,
                lain_lain       varchar(50) null, 
                created_at     datetime not null, 
                updated_at     datetime not null  
            )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExist("pemeriksaan_psikiatrik");
    }
}

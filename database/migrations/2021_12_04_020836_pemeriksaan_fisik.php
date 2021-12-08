<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PemeriksaanFisik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
                create table pemeriksaan_fisik(
                    id_pem_fisik    varchar(15) not null primary key,
                    T               varchar(50) not null,
                    N               varchar(50) not null,
                    RR              varchar(50) not null,
                    SB              varchar(50) not null,
                    penampilan      varchar(2) not null,
                    cara_berjalan   varchar(2) not null,
                    cara_bicara     varchar(2) not null,
                    konjungtiva     varchar(2) not null,
                    bekas_suntikan  varchar(2) not null,
                    tremor          varchar(2) not null,  
                    created_at      datetime not null, 
                    updated_at      datetime not null  
                )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExist("pemeriksaan_fisik");
    }
}

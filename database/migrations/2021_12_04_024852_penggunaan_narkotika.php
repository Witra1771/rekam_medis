<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenggunaanNarkotika extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table penggunaan_narkotika(
                id_pgnn_narkotika   varchar(15) not null primary key,
                alkohil             varchar(50) null,
                analgesik           varchar(1) null,
                kokain              varchar(1) null,
                halusinogen         varchar(1) null,
                heroin              varchar(1) null,
                barbibutat          varchar(1) null,
                amfetamin           varchar(1) null,
                inhalan             varchar(1) null,
                metadon             varchar(1) null,
                sedaptif_hpnotik    varchar(1) null,
                kanabis             varchar(1) null,
                4zat_lebih          varchar(1) null,
                zat_lain            varchar(1) null,
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
        Schema::dropIfExist("penggunaan_narkotika");
    }
}

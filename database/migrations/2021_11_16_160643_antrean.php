<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Antrean extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table antrean(
                id_antrean      varchar(15) not null primary key,
                antreana        varchar(4) not null,
                antreanb        varchar(4) not null,
                tanggal         date not null,
                id_user         varchar(15) not null,
                id_pasien       varchar(15) not null,
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
        Schema::dropIfExist("antrean");
    }
}

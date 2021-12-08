<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelSpesialis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table spesialis(
                kode_spesialis            varchar(15) not null primary key,
                spesialis_kedokteran    varchar(10) not null,
                created_at              datetime not null, 
                updated_at              datetime not null
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
        Schema::dropIfExist("spesialis");
    }
}

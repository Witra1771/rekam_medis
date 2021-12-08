<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JenisPenyakit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table jenis_penyakit(
                id_jenis_penyakit   varchar(15) not null,
                jenis_penyakit      varchar(50) null,
                dari                date null,
                sampai              date null,
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
        Schema::dropIfExist("jenis_penyakit");
    }
}

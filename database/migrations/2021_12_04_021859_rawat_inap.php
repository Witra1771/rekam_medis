<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RawatInap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table rawat_inap(
                id_rawat_inap       varchar(15) not null,
                inap_jenis_penyakit varchar(50) null, 
                jenis_penyakit      varchar(50) null,
                dari                varchar(50) null,
                sampai              varchar(50) null,
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
        Schema::dropIfExist("rawat_inap");
    }
}

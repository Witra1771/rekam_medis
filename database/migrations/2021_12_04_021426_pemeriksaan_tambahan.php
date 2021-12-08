<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PemeriksaanTambahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table pemeriksaan_tambahan(
                id_pem_tambahan varchar(15) not null primary key,
                benzodiazepine  varchar(2) null,
                cocaine         varchar(2) null,
                amphetamin      varchar(2) null,
                cthc_marijuana  varchar(2) null,
                methaphetamine  varchar(2) null,
                morphin         varchar(2) null,
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
        Schema::dropIfExist("pemeriksaan_tambahan");
    }
}

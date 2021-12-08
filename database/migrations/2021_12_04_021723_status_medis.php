<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StatusMedis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table status_medis(
                id_status_medis         varchar(15) not null primary key,
                id_jenis_penyakit     varchar(50) null,
                riwayat_p_kronis        varchar(50) null,
                riwayat_jenis_penyakit  varchar(50) null,
                terapi_medis            varchar(50) null,
                hiv                     varchar(50) null,
                hepatitis_B             varchar(50) null,
                hepatitis_c             varchar(50) null,
                created_at              datetime not null, 
                updated_at              datetime not null  
            )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExist("status_medis");
    }
}

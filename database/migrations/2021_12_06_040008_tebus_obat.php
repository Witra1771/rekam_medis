<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TebusObat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table tebus_obat(
                id_tebus_obat   varchar(15) not null primary key,
                id_resep_obat  varchar(50) null,
                id_jumlah_beli  varchar(50) null,
                id_sub_total    varchar(50) null,
                created_at      datetime not null, 
                updated_at       datetime not null  
            )');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExist("tebus_obat");
    }
}

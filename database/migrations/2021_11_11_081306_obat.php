<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Obat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table obat(
                id_obat             bigint not null auto_increment primary key,
                nama_obat           varchar(50) not null,
                jenis_obat          varchar(30) not null,
                satuan              varchar(10) not null,
                qty                 int(3) not null,
                harga_beli          float not null,
                harga_jual          float not null,
                created_at          datetime not null, 
                updated_at          datetime not null
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
        Schema::dropIfExist("obat");
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pendaftaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
            create table pasien(
                id_pasien           bigint not null auto_increment primary key,
                NIK                 varchar(12) not null unique,
                nama_pasien         varchar(50) not null,
                tempatLahir         varchar(30) not null,
                tanggalLahir        date not null,
                umur                varchar(3) not null,
                JK                  enum("Laki-laki", "Perempuan"),
                Pekerjaan           varchar(255) not null,
                Alamat              varchar(255) not null,
                Desa                varchar(255) not null,
                noHp                varchar(13) not null,
                statusPerkawinan    enum("Belum Menikah", "Menikah", "Cerai Mati", "Cerai Hidup"),
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
        Schema::dropIfExist("pasien");
    }
}

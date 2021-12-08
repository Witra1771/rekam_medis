<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create tavbel
        DB::statement('
            create table user(
                id_user           bigint not null auto_increment primary key,
                nama              varchar(255) not null,
                hak_akses         varchar(11) not null,
                username          varchar(15) not null,
                password          varchar(15) not null,
                dokter_spesialis  varchar(30) not null,
                jk                varchar(1) not null,
                tempat_lahir      varchar(30) not null,
                tanggal_lahir     date not null,
                alamat            varchar(255) not null,
                no_hp             varchar(13) not null,
                created_at        datetime null, 
                updated_at        datetime null
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
        Schema::dropIfExists('user');
    }
}

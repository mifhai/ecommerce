<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlamatUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alamat_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('alamat_lengkap');
            $table->string('province_name');
            $table->string('kota_kab_name');
            $table->string('kecamatan_name');
            $table->string('kelurahan_name');
            $table->string('kode_pos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alamat_users');
    }
}

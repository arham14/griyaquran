<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelajaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_siswa');
            $table->string('griya', 11);
            $table->string('kode_pengajar');
            $table->string('hari');
            $table->string('jam');
            $table->string('jilid');
            $table->boolean('prog_dinar');
            $table->boolean('prog_liqo');
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
        Schema::dropIfExists('pembelajaran');
    }
}

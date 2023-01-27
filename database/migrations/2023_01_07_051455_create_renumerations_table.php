<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenumerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renumerations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('alamat');
            $table->string('no_induk_pegawai');
            $table->string('tempat_bertugas');
            $table->integer('id_jabatan');
            $table->string('penilaian');
            $table->string('bonus_retensi');
            $table->string('upah_lembur');
            $table->string('jam_lembur_total');
            $table->string('gaji_pokok');
            $table->string('jasa_produksi');
            $table->string('triwulan');
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
        Schema::dropIfExists('renumerations');
    }
}

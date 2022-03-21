<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePendidikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ktp')->unsigned();
            $table->string('nama_sekolah');
            $table->string('jurusan');
            $table->string('th_masuk');
            $table->string('th_lulus');
            $table->timestamps();

            $table->foreign('ktp')
                  ->references('ktp')
                  ->on('karyawan')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

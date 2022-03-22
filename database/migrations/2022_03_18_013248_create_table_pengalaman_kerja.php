<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePengalamanKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ktp')->unsigned();
            $table->string('perusahaan');
            $table->string('jabatan');
            $table->string('tahun');
            $table->string('keterangan');
            $table->timestamps();

            $table->foreign('ktp')
                  ->references('ktp')
                  ->on('karyawan')
                  ->onDelete('cascade');
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

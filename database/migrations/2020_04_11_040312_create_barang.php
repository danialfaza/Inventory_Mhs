<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->bigInteger('id_ruangan')->unsigned();
            $table->string('nama_barang');
            $table->integer('total');
            $table->integer('broken');
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('id_ruangan')->references('id')->on('ruangan')
                    ->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('user')
                    ->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('user')
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
        Schema::dropIfExists('barang');
    }
}

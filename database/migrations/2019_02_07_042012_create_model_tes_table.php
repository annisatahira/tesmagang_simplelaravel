<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelTesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tesmagang', function (Blueprint $table) {
            $table->string('_trxhash'); //membuat kolom id auto increment
            $table->string('_from'); //membuat kolom dari
            $table->string('_to'); //membuat kolom untuk
            $table->integer('_amount'); //membuat kolom jumlah
            $table->text('_status'); //membuat kolom alamat dengan tipe text
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
        Schema::dropIfExists('tesmagang');
    }
}

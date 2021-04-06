<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlasemenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klasemen_klub', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_klub');
            $table->integer('main');
            $table->integer('menang');
            $table->integer('seri');
            $table->integer('kalah');
            $table->integer('jumlah_point');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klasemen');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('manr');
            $table->string('track');
            $table->bigInteger('labelcode');
            $table->string('label');
            $table->string('isrc');
            $table->bigInteger('catalogno');
            $table->bigInteger('ean');
            $table->string('release_date');
            $table->string('composer');

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
        Schema::drop('tracks');
    }
}

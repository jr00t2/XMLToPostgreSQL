<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gvlcode');
            $table->string('firstname');
            $table->string('secondname');
            $table->string('thirdname');
            $table->string('street');
            $table->string('countrycode');
            $table->string('zip');
            $table->string('location');
            $table->string('postbox');
            $table->string('phone');
            $table->string('fax');
            $table->string('ifpiaccount');
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
        Schema::drop('manufacturers');
    }
}

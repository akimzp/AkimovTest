<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CountriesLengviches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries_lengviches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcountry');
            $table->integer('idlengvich');
            $table->foreign('idcountry')->references('id')->on('countries');
            $table->foreign('idlengvich')->references('id')->on('lengviches');
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
        Schema::drop('countries_lagviches');
    }
}

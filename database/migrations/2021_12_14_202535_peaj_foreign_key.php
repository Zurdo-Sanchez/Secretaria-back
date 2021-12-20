<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PeajForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_ejes', function (Blueprint $table) {
            $table->unsignedBigInteger('eje_id')->unsigned();
            $table->foreign('eje_id')->references('id')->on('ejes');
        });

        Schema::table('lines', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_eje_id')->unsigned();
            $table->foreign('sub_eje_id')->references('id')->on('sub_ejes');
        });
        Schema::table('data', function (Blueprint $table) {
            $table->unsignedBigInteger('line_id')->unsigned();
            $table->foreign('line_id')->references('id')->on('lines');
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

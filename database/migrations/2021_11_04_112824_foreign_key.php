<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Files', function (Blueprint $table) {
            $table->unsignedBigInteger('agrupation')->unsigned();
            $table->foreign('agrupation')->references('id')->on('agrupations');
            $table->bigInteger('user')->unsigned();
            $table->foreign('user')->references('id')->on('users');
        });

        Schema::table('External_passes', function (Blueprint $table) {
            $table->unsignedBigInteger('from')->unsigned();
            $table->foreign('from')->references('id')->on('offices');
            $table->unsignedBigInteger('to')->unsigned();
            $table->foreign('to')->references('id')->on('offices');
            $table->bigInteger('responsable')->unsigned();
            $table->foreign('responsable')->references('id')->on('users');
            $table->bigInteger('file')->unsigned();
            $table->foreign('file')->references('id')->on('files');
        });

        Schema::table('Internal_passes', function (Blueprint $table) {
            $table->unsignedBigInteger('from')->unsigned();
            $table->foreign('from')->references('id')->on('users');
            $table->unsignedBigInteger('to')->unsigned();
            $table->foreign('to')->references('id')->on('users');
            $table->bigInteger('responsable')->unsigned();
            $table->foreign('responsable')->references('id')->on('users');
            $table->bigInteger('external_passe')->unsigned();
            $table->foreign('external_passe')->references('id')->on('external_passes');
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

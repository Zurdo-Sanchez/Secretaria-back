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
        Schema::table('files', function (Blueprint $table) {
            $table->unsignedBigInteger('agrupation_id')->unsigned();
            $table->foreign('agrupation_id')->references('id')->on('agrupations');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('external_passes', function (Blueprint $table) {
            $table->unsignedBigInteger('from')->unsigned();
            $table->foreign('from')->references('id')->on('offices');
            $table->unsignedBigInteger('to')->unsigned();
            $table->foreign('to')->references('id')->on('offices');
            $table->bigInteger('responsable')->unsigned();
            $table->foreign('responsable')->references('id')->on('users');
            $table->bigInteger('file')->unsigned();
            $table->foreign('file')->references('id')->on('files');
        });

        Schema::table('internal_passes', function (Blueprint $table) {
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

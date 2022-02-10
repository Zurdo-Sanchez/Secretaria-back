<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotObjetionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('not_objetions', function (Blueprint $table) {
            $table->id();
            $table->string('Puesto')->nullable();;
            $table->string('tipo_puesto')->nullable();;
            $table->string('tipo_contrato')->nullable();;
            $table->string('Apellido')->nullable();;
            $table->string('Nombre')->nullable();;
            $table->string('ciut')->nullable();;
            $table->string('tarea')->nullable();
            $table->timestamp('desde')->nullable();
            $table->timestamp('hasta')->nullable();
            $table->bigInteger('dedicacion')->unsigned()->nullable();
            $table->bigInteger('honorarios')->unsigned()->nullable();
            $table->bigInteger('PG')->unsigned()->nullable();
            $table->text('observaciones_pg')->nullable();
            $table->string('dependecia_nacional')->nullable();
            $table->timestamp('fecha_nota')->nullable();
            $table->text('observaciones')->nullable();
            $table->bigInteger('importe_total')->unsigned()->nullable();
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
        Schema::dropIfExists('not_objetions');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('primer_nombre');
            $table->string('apellido');
            $table->integer('compania_id');
            $table->string('correo');
            $table->string('telefono');
            $table->timestamps();
        });

        Schema::table('empleados', function (Blueprint $table) {
            $table->foreign('compania_id')->references('id')->on('compañias');
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
};

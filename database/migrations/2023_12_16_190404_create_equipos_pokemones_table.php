<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposPokemonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos_pokemones', function (Blueprint $table) {
            $table->id();
            $table->string('orden');

            $table->foreignId('equipos_id')
            ->nullable()
            ->constrained('equipos')
            ->cascadeOnUpdate()
            ->nullOnDelete();

            $table->foreignId('pokemones_id')
            ->nullable()
            ->constrained('pokemones')
            ->cascadeOnUpdate()
            ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos_pokemones');
    }
}

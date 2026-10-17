
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('equipo_local_id')
                ->constrained('equipos')
                ->cascadeOnDelete();

            $table->foreignId('equipo_visitante_id')
                ->constrained('equipos')
                ->cascadeOnDelete();

            $table->dateTime('fecha_hora');
            $table->string('lugar');
            $table->enum('estado', [
                'programado',
                'en_juego',
                'finalizado'
            ])->default('programado');

            $table->unsignedSmallInteger('puntos_local')->nullable();
            $table->unsignedSmallInteger('puntos_visitante')->nullable();

            $table->timestamps();

            $table->index('fecha_hora');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};

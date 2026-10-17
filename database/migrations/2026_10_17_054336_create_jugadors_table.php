
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();

            $table->foreignId('equipo_id')
                ->constrained('equipos')
                ->cascadeOnDelete();

            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('dni', 8)->unique();
            $table->unsignedTinyInteger('numero_camiseta');
            $table->enum('posicion', [
                'Base',
                'Escolta',
                'Alero',
                'Ala-pívot',
                'Pívot',
            ]);
            $table->date('fecha_nacimiento')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jugadores');
    }
};

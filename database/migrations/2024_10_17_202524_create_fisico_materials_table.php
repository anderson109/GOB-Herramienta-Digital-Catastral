<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fisico_materials', function (Blueprint $table) {
            $table->id();
            $table->string('extensionTerritorial')->nullable();
            $table->string('poblacionEstimada')->nullable();
            $table->string('numeroDeViviendas')->nullable();
            $table->string('promedioHabitantes')->nullable();
            $table->string('numeroHabitantes')->nullable();
            $table->string('clasificacionMetropolitana')->nullable();
            $table->string('materialesVivienda')->nullable();
            $table->string('transportePublico')->nullable();
            $table->string('estadoAccesoPrincipal')->nullable();
            $table->string('aguaPotable')->nullable();
            $table->string('energia')->nullable();
            $table->string('alumbradoPublico')->nullable();
            $table->string('aguasNegras')->nullable();
            $table->string('aguasLluvias')->nullable();
            $table->string('trenAseo')->nullable();
            $table->string('servicioTrenAseo')->nullable();

            $table->foreignId('id_colonia')
            ->nullable()
            ->constrained('colonias')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fisico_materials');
    }
};

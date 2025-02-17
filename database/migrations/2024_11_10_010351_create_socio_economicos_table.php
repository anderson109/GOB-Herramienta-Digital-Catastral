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
        Schema::create('socio_economicos', function (Blueprint $table) {
            $table->id();
            $table->string('ActividadEconomica')->nullable();
            $table->string('ValorEvaluado')->nullable();
            $table->string('CamarasComercio')->nullable();
            $table->string('Cooperativas')->nullable();
            $table->string('PropietarioLegal')->nullable();
            $table->string('Financiamiento')->nullable();


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
        Schema::dropIfExists('socio_economicos');
    }
};

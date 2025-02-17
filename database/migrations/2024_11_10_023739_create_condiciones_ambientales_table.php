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
        Schema::create('condiciones_ambientales', function (Blueprint $table) {
            $table->id();
            $table->string('RiesgosNaturales')->nullable();

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
        Schema::dropIfExists('condiciones_ambientales');
    }
};

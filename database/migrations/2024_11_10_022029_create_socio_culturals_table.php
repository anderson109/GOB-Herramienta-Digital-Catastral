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
        Schema::create('socio_culturals', function (Blueprint $table) {
            $table->id();
            $table->string('Adescos')->nullable();
            $table->string('Escolaridad')->nullable();
            $table->string('Salud')->nullable();
            $table->string('RiesgoSocial')->nullable();

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
        Schema::dropIfExists('socio_culturals');
    }
};

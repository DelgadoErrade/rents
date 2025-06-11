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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('inquilino', 20);
            $table->string('clave', 32);
            $table->char('tipo_usuario', 3)->default('USU');
            $table->string('nombre_inquilino', 45);
            $table->string('responsable_inquilino', 45);
            $table->string('correo_electronico', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};

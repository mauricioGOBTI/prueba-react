<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('cliente');
            $table->string('nombre');
            $table->string('rfc');
            $table->string('calle');
            $table->string('num_exterior');
            $table->string('num_interior');
            $table->string('entidad_federativa');
            $table->string('municipio');
            $table->integer('codigo_postal');
            $table->string('titular_area');
            $table->string('correo_titular');
            $table->integer('telefono');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};

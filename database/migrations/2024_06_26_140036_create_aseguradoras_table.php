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
        Schema::create('aseguradoras', function (Blueprint $table) {
            $table->id();
            $table->string("razon_social");
            $table->string("nombre_comrecial");
            $table->integer("telefono");
            $table->string("rfc", 13);
            $table->string("correo_contacto")->unique();
            $table->string("calle");
            $table->string("no_exterior");
            $table->string("colonia");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aseguradoras');
    }
};

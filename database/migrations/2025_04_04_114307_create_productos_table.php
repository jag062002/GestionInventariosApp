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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('proveedor_id');
            $table->string("codigo", 64)->unique();
            $table->string("nombre", 64);
            $table->string('usuario_creacion', 64);
            $table->string('usuario_actualizacion', 64);
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('proveedor_id')->references('id')->on('proveedors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

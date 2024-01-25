<?php

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos_has_categorias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignIdFor(Producto::class);
            $table->foreignIdFor(Categoria::class);

            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_has_categorias');
    }
};

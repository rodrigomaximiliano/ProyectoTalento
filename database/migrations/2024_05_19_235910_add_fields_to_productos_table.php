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
        Schema::table('productos', function (Blueprint $table) {
            // Agrega la columna 'sku' solo si no existe
            if (!Schema::hasColumn('productos', 'sku')) {
                $table->string('sku')->unique()->after('id');
            }

            // No agregues la columna 'description' ya que ya existe

            // Agrega la columna 'image_url' solo si no existe
            if (!Schema::hasColumn('productos', 'image_url')) {
                $table->string('image_url')->nullable()->after('price');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            if (Schema::hasColumn('productos', 'sku')) {
                $table->dropColumn('sku');
            }
            if (Schema::hasColumn('productos', 'image_url')) {
                $table->dropColumn('image_url');
            }
        });
    }
};



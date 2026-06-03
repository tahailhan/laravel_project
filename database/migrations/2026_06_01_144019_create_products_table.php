<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Bunu da eklediğinden emin ol

            $table->string('title');
            $table->string('keywords');
            $table->text('description');

            // --- YENİ EKLENEN EKSİK SÜTUNLAR BURADAN BAŞLIYOR ---
            $table->text('detail')->nullable();
            $table->decimal('price', 10, 2); // Küsüratlı fiyatlar için (Örn: 1000.50)
            $table->integer('stock')->default(0);
            $table->integer('min_stock')->default(0);
            $table->decimal('discount', 10, 2)->nullable()->default(0);
            // ----------------------------------------------------

            $table->string('image')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

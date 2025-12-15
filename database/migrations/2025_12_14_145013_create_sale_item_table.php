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
        Schema::create('sale_item', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('sale_id')
                ->constrained('sale')
                ->cascadeOnDelete();

            $table->foreignId('product_id')
                ->constrained('product')
                ->restrictOnDelete();

            $table->integer('amount');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('unit_cost', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->decimal('profit', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_item');
    }
};

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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('product_unit_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->string('shipping')->nullable();
            $table->integer('rating')->nullable();
            $table->text('wishlist')->nullable();
            $table->integer('weight')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};

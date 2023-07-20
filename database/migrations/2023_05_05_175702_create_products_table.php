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
        // Schema::connection('pgsql')->create('data_internal.products', function (Blueprint $table) {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->integer('price');
            $table->integer('stock');
            $table->integer('discount');
            $table->string('status');
            $table->integer('rating');
            $table->string('slug');
            $table->text('description');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

                // $table->string('name');
            // $table->double('price');
            // $table->text('description');
            // $table->string('image');
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

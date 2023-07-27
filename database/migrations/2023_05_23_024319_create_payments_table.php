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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable();     
            $table->string('user_id')->nullable();     
            $table->string('order_code')->nullable();     
            $table->integer('grant_total')->nullable();     
            $table->string('status')->nullable();
            $table->string('account_bank')->nullable();
            $table->string('shipping')->nullable();
            $table->string('snap_token', 36)->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

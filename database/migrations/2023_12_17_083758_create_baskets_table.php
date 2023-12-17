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
        Schema::create('baskets', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');

            $table->unsignedInteger('product_id')->nullable();
            $table->foreign('product_id')->on('products')->references('id')->onDelete('cascade');

            $table->string('product_title')->nullable();
            $table->string('demo_url')->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->unsignedInteger('number')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baskets');
    }
};

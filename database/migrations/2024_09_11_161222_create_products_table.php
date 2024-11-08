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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->decimal('productCost', 10, 2);
            $table->decimal('productSell', 10, 2);
            $table->integer('productQuantity');
            $table->integer('stockAlert');
            $table->timestamp('productExpired');
            $table->timestamp('expiredAlert');
            $table->string('productProof');
            $table->tinyInteger('productStatus')->default(1);

            // Foreign Key
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('users');

            $table->unsignedBigInteger('categoryId');
            $table->foreign('categoryId')->references('id')->on('categories');
            
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

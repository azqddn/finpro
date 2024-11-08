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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            
            //Foreign Key
            $table->unsignedBigInteger('transId')->nullable();
            $table->foreign('transId')->references('id')->on('inventory_transactions')->onDelete('cascade');
            //Foreign Key
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');

            $table->string('recordDesc');
            $table->decimal('recordRevenue', 10, 2)->nullable();
            $table->decimal('recordExpenses', 10, 2)->nullable();
            $table->decimal('recordBalance', 10, 2);
            $table->string('recordNotes')->nullable();
            $table->string('recordProof')->nullable();
            $table->tinyInteger('recordStatus')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};

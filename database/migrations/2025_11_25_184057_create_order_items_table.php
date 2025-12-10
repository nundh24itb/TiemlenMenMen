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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
        //     $table->foreignId('order_id')->constrained()->cascadeOnDelete();
        //     $table->foreignId('product_id')->constrained()->cascadeOnDelete();
        //     $table->integer('quantity')->default(1);
        //     $table->decimal('price', 10, 2);
        //     $table->timestamps();
        // });
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('product_name');
            $table->integer('quantity')->default(1);
            $table->decimal('price', 12, 2);
            $table->decimal('subtotal', 12, 2);
            $table->timestamps();


            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};

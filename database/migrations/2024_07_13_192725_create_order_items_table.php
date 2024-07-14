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
            $table->integer('order_id')->default(0);
            $table->integer('menu_id')->default(0);
             $table->integer('restaurant_id')->nullable(false);
            $table->float('price')->default(0);
            $table->integer('quantity')->default(0);
            // $table->decimal('unit_amount', 8, 2)->nullable();
            // $table->decimal('total_amount', 8, 2)->nullable();
            $table->timestamps();


          
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

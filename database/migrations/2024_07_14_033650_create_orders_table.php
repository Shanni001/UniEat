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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
          

            $table->integer('restaurant_id')->nullable(false);
            $table->integer('user_id');
            $table->string('name');
            $table->string('phone');
            $table->string('comments')->nullable();
            $table->string('order_type');
            $table->string('payment_method');
            $table->dateTime('collection_time');
            $table->string('status');
            $table->float('bill');
            // $table->decimal('grand_total', 8, 2)->nullable();

           
            // $table->string('payment_status')->nullable();
            // $table->enum('status', ['new', 'processing','ready','cancelled'])->default('new');
            $table->timestamps();

           
            
         
        
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

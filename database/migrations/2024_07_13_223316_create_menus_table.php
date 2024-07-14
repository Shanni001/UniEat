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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('menu_name');
           // $table->string('slug')->unique();
            $table->longtext('menu_description');
            $table->string('image')->nullable;
            $table->string('method');
            $table->string('send');
            $table->decimal("price", 8, 2);
            
           

            // $table->boolean('available')->default(false);
            $table->foreignId('restaurant_id')->constrained()->onDelete('cascade');
           
            //$table->foreignId('vendor_id')->constrained()->onDelete('cascade');
            $table->timestamps();
                
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};

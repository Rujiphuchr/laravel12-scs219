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
        Schema::create('testproducts_info', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('stock_quantity')->nullable(); // integer / nullable
            $table->float('price')->nullable(); // float / nullable
            $table->string('product_name')->nullable(); // string / nullable
            $table->date('manufactured_date')->nullable(); // date / nullable
            $table->text('description')->nullable(); // text / nullable
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testproducts_info');
    }
};

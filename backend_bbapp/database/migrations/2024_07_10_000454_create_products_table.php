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
            $table->id('id');
            $table->string('product_name');
            $table->string('quantity');
            $table->string('height');
            $table->string('width');
            $table->string('page_quantity');
            $table->enum('print_type', ["1/2 pliego", "1/4 pliego", "1/4 pliego mayor"]);

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
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

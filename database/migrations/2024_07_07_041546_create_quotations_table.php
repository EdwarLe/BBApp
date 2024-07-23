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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id('id');
            $table->integer('quantity');
            $table->text('description');
            $table->float('price');
            $table->float('advance_percentage');
            $table->float('remaining_percentage');
            $table->boolean('is_sales')->default(false);

            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};

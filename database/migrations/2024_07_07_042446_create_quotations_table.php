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
            $table->id('quotation_id');
            $table->integer('client_id');
            $table->string('company_name');
            $table->integer('quantity');
            $table->text('description');
            $table->integer('service_id');
            $table->float('price');
            $table->float('advance_percentage');
            $table->float('remaining_percentage');
            $table->boolean('is_sales');
            $table->integer('user_id');
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

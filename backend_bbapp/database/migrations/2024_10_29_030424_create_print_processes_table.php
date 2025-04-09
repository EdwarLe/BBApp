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
        Schema::create('print_processes', function (Blueprint $table) {
            $table->id('id');
            $table->enum('name_paper_type_process', ["Papel Interno", "Papel Carátula", "Papel Insertos"]);
            $table->integer('quantity');
            $table->decimal('unit_cost', 8, 2);

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('print_processes');
    }
};

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
        Schema::create('miscellaneouses', function (Blueprint $table) {
            $table->id('miscellaneous_id');
            $table->string('miscellaneous_name');
            $table->float('quantity');
            $table->float('price');
            $table->string('change_measurement');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('miscellaneouses');
    }
};

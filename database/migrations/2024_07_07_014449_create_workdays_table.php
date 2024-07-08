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
        Schema::create('workdays', function (Blueprint $table) {
            $table->id('workday_id');
            $table->timestamp('date_start')->useCurrent();
            $table->timestamp('lunch_star')->useCurrent();
            $table->timestamp('lunch_end')->useCurrent();
            $table->timestamp('date_end')->useCurrent();
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workdays');
    }
};

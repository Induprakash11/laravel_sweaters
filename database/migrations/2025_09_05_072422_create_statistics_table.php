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
        Schema::create('statistics', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('brandid')->nullable();
            $table->integer('status');
            $table->string('image');
            $table->date('date');
            $table->string('crutchers', 1000);
            $table->string('title');
            $table->string('wheelchair', 5000);
            $table->string('walkers', 5000);
            $table->string('tokenvalue')->nullable();
            $table->string('withoutdevice');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};

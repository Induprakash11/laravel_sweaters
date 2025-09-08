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
        Schema::create('testimonial_report', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('date', 100);
            $table->string('image', 100);
            $table->string('name', 100);
            $table->string('message');
            $table->tinyInteger('rating');
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonial_report');
    }
};

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
        Schema::create('productnew', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('date', 100);
            $table->string('category', 100);
            $table->string('product_name', 100);
            $table->longText('specification');
            $table->string('video_url', 100);
            $table->longText('information');
            $table->longText('features');
            $table->longText('application');
            $table->string('product_image', 100);
            $table->smallInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productnew');
    }
};

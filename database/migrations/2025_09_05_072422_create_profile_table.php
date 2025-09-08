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
        Schema::create('profile', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('date', 100);
            $table->string('title', 100);
            $table->string('mobile_number', 100);
            $table->string('email', 100);
            $table->string('address');
            $table->string('image', 100);
            $table->string('home', 100);
            $table->string('homevalue', 100);
            $table->string('about', 100);
            $table->string('aboutvalue', 100);
            $table->string('product', 100);
            $table->string('productvalue', 100);
            $table->string('productnew', 100);
            $table->string('productnew_value', 100);
            $table->string('gallery', 100);
            $table->string('gallery_value', 100);
            $table->string('career', 100);
            $table->string('career_value', 100);
            $table->string('footer_title', 225);
            $table->string('company_site', 200);
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};

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
        Schema::create('socialmedia_url', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('date', 100);
            $table->string('facebook', 100);
            $table->string('instagram', 100);
            $table->string('twitter', 100);
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socialmedia_url');
    }
};

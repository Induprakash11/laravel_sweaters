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
        Schema::create('career', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('date', 100);
            $table->string('name', 100);
            $table->string('email', 100);
            $table->string('phonenumber', 100);
            $table->string('file', 100);
            $table->string('skills', 100);
            $table->string('experience', 100);
            $table->string('comment');
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career');
    }
};

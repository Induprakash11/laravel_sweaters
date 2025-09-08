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
        Schema::create('landing_users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('date', 100);
            $table->string('name', 100);
            $table->string('mobile', 100);
            $table->string('message', 100);
            $table->tinyInteger('status');
            $table->dateTime('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_users');
    }
};

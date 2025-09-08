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
        Schema::create('email', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('date', 100);
            $table->string('email', 100);
            $table->string('email_protocol', 100);
            $table->string('email_host', 100);
            $table->string('email_username', 100);
            $table->string('email_password', 100);
            $table->string('email_port', 100);
            $table->string('edit', 100);
            $table->string('editvalue', 100);
            $table->string('active', 100);
            $table->string('activevalue', 100);
            $table->tinyInteger('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email');
    }
};

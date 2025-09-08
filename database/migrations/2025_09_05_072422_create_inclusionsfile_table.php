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
        Schema::create('inclusionsfile', function (Blueprint $table) {
            $table->comment('Multiple File upload in Codeigniter ');
            $table->integer('id', true);
            $table->string('file_name')->nullable();
            $table->string('token')->nullable();
            $table->string('file_type');
            $table->string('tokenvalue');
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inclusionsfile');
    }
};

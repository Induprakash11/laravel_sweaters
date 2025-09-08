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
        Schema::create('visits', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('date', 100);
            $table->string('ip_address', 100)->unique('ip_address');
            $table->string('first_visit', 100);
            $table->string('last_visit', 100);
            $table->string('visit_count', 100);
            $table->string('country', 100)->nullable();
            $table->string('region', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->text('user_agent');
            $table->tinyInteger('status');
            $table->boolean('form_submitted')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};

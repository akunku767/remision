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
        Schema::create('thresholds', function (Blueprint $table) {
            $table->id();
            $table->string('category', 50);
            $table->integer('start_year')->nullable();
            $table->enum('notation', ['>', '-', '<']);
            $table->integer('end_year');
            $table->decimal('CO', 5, 2);
            $table->integer('HC');
            $table->string('desc', 100);
            $table->string('identity', 12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thresholds');
    }
};

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
        Schema::create('results', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('vehicle_id');
            $table->date('tested_at');
            $table->integer('CO');
            $table->integer('HC');
            $table->foreign('vehicle_id')
                ->references('id')->on('vehicles')->onDelete('cascade');
            $table->string('reference_number', 12)->unique();
            $table->string('identity', 12)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};

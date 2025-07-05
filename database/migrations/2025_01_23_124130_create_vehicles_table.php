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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('threshold_id');
            $table->string('rfid');
            $table->string('license_plate', 12);
            $table->enum('category', ['Sepeda Motor 2 langkah','Sepeda Motor 4 langkah','Sepeda Motor', 'Mobil Penumpang', 'Mobil Barang', 'Truck']);
            $table->string('brand', 50);
            $table->integer('production_year', 6);
            $table->enum('fuel', ['Bensin', 'Solar']);
            $table->string('color', 50);
            $table->string('chassis_number', 50);
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');
            $table->foreign('threshold_id')
                ->references('id')->on('thresholds')->onDelete('cascade');
            $table->string('identity', 12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

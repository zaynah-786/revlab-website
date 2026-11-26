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
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');

            $table->foreignId('company_id')->constrained()->cascadeOnDelete();

            $table->integer('year')->nullable();
            $table->string('country')->nullable();
            $table->string('production_numbers')->nullable();
            $table->integer('torque_nm')->nullable();
            $table->decimal('zero_to_hundred_s', 4, 1)->nullable();
            $table->integer('top_speed_kmh')->nullable();
            $table->string('engine')->nullable();
            $table->string('transmission')->nullable();
            $table->string('drivetrain')->nullable();
            $table->integer('weight_kg')->nullable();
            $table->string('chassis')->nullable();
            $table->string('aero_highlight')->nullable();
            $table->text('description')->nullable();
            $table->string('sketchfab_url')->nullable();

            $table->integer('horsepower')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_models');
    }
};

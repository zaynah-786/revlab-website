<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('car_models', function (Blueprint $table) {
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
        });
    }

    public function down(): void
    {
        Schema::table('car_models', function (Blueprint $table) {
            $table->dropColumn([
                'year',
                'country',
                'production_numbers',
                'torque_nm',
                'zero_to_hundred_s',
                'top_speed_kmh',
                'engine',
                'transmission',
                'drivetrain',
                'weight_kg',
                'chassis',
                'aero_highlight',
                'description',
                'sketchfab_url',
            ]);
        });
    }
};
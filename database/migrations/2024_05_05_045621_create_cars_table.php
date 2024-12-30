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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company');
            $table->string('carmodel');
            $table->string('description');
            $table->string('cartype');
            $table->string('transmissiontype');
            $table->string('fueltype');
            $table->integer('year');
            $table->integer('stock');
            $table->bigInteger('price');
            $table->string('frontimage');
            $table->string('backimage');
            $table->string('sideimage');
            $table->string('interiorimage');
            $table->timestamps();
        });
    }

    /*
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

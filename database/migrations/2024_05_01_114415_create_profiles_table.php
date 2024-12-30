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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_address');
            $table->string('user_city');
            $table->integer('pincode');
            $table->string('user_number');
            $table->date('user_dob');
            $table->string('user_picture')->default('no-pic.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};

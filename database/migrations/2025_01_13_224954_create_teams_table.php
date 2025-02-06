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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('phone')->unique();
            $table->string('gender');
            $table->string('picture')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('restaurant_id')->nullable();

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
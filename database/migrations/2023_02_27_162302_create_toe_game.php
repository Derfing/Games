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
        Schema::create('toe_game', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('player_1')->nullable();
            $table->unsignedBigInteger('player_2')->nullable();
            $table->foreign('player_1')->references('id')->on('users');
            $table->foreign('player_2')->references('id')->on('users');
            $table->string('winner')->nullable();
            $table->string('hist')->nullable(); //string for parse
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toe_game');
    }
};

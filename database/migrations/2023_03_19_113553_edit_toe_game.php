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
        Schema::table('toe_game', function (Blueprint $table){
            $table->foreign('player_1')->references('id')->on('users')->onDelete('null');
            $table->foreign('player_2')->references('id')->on('users')->onDelete('null');
            $table->foreign('winner')->references('id')->on('users')->onDelete('null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

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
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('type1_id')->constrained('types');
            $table->foreignId('type2_id')->nullable()->constrained('types');
            $table->integer('base_hp');
            $table->integer('min_hp');
            $table->integer('max_hp');
            $table->integer('base_attack');
            $table->integer('min_attack');
            $table->integer('max_attack');
            $table->integer('base_defense');
            $table->integer('min_defense');
            $table->integer('max_defense');
            $table->integer('base_special_attack');
            $table->integer('min_special_attack');
            $table->integer('max_special_attack');
            $table->integer('base_special_defense');
            $table->integer('min_special_defense');
            $table->integer('max_special_defense');
            $table->integer('min_speed');
            $table->integer('max_speed');
            $table->integer('base_speed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemons');
    }
};

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
        Schema::create('use', function (Blueprint $table) {
            $table->id();
            $table->foreignId('thing_id')->constrained('things')->onDelete('cascade'); // связь с таблицей things
            $table->foreignId('place_id')->constrained('places')->onDelete('cascade'); // связь с таблицей places
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // связь с таблицей users
            $table->integer('amount'); // количество
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('use');
    }
};

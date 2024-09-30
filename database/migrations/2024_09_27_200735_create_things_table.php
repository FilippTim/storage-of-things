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
        Schema::create('things', function (Blueprint $table) {
            $table->id(); // Автоматический инкрементный ID
            $table->string('name'); // Имя вещи
            $table->text('description'); // Описание вещи
            $table->string('wrnt'); // Гарантия/срок годности
            $table->foreignId('master')->constrained('users')->onDelete('cascade'); // Создатель вещи
            $table->timestamps(); // Временные метки created_at и updated_at
        });;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('things');
    }
};

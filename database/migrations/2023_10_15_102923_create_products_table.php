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
        Schema::create('products', function (Blueprint $table) {
            $table->string('id')->primary(); // Автоинкрементируемый идентификатор продукта
            $table->string('name'); // Название продукта
            $table->text('description'); // Описание продукта
            $table->decimal('price', 10, 2); // Цена продукта (десятичное число)
            $table->string('image'); // Ссылка на изображение продукта
            $table->timestamps(); // Добавляет поля created_at и updated_at для отслеживания дат создания и обновления записей
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

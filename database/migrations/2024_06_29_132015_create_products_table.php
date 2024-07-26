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
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->string('content')->nullable();
            $table->string('status');
            $table->string('image')->nullable();
            $table->integer('order')->nullable();
            $table->integer('sku')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('is_featured')->nullable();
            $table->integer('is_variantion')->nullable()->comment('Biến thể');
            $table->double('price');
            $table->double('sale_price')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->double('length')->nullable()->comment('dài');
            $table->double('wide')->nullable()->comment('rộng');
            $table->double('height')->nullable()->comment('cao');
            $table->double('weight')->nullable()->comment('nặng');
            $table->string('height_unit')->nullable()->comment('đơn vị');
            $table->string('weight_unit')->nullable()->comment('đơn vị');
            $table->string('wide_unit')->nullable()->comment('đơn vị');
            $table->string('length_unit')->nullable()->comment('đơn vị');



            $table->timestamps();
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

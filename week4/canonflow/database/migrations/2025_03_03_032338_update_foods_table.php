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
        Schema::table('foods', function (Blueprint $table) {
            $table->string('name');
            $table->text('nutritional_fact');
            $table->text('description');
            $table->double('price', 8, 2);

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('foods', function (Blueprint $table) {
            $table->dropColumn(['name', 'nutritional_fact', 'description', 'price', 'category_id']);
            $table->dropForeign(['category_id']);
        });
    }
};

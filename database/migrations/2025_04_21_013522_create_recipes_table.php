<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id('rid');
            $table->string('name');
            $table->text('description');
            $table->string('type');
            $table->integer('Cookingtime');
            $table->text('ingredients');
            $table->text('instructions');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('uid');
            $table->foreign('uid')->references('uid')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->integer('prep_time');
            $table->integer('cook_time');
            $table->string('skill_level');
            $table->text('content')->nullable();
            $table->string('thumbnail');
            $table->integer('recipe_categories_id');
            $table->integer('user_id');
            $table->integer('caloric')->nullable();
            $table->integer('protein')->nullable();
            $table->integer('fat')->nullable();
            $table->integer('carbohydrates')->nullable();
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}

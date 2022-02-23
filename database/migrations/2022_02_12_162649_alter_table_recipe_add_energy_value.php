<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableRecipeAddEnergyValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->integer('caloric')->nullable();
            $table->integer('protein')->nullable();
            $table->integer('fat')->nullable();
            $table->integer('carbohydrates')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropColumn('caloric');
            $table->dropColumn('protein');
            $table->dropColumn('fat');
            $table->dropColumn('carbohydrates');
        });
    }
}

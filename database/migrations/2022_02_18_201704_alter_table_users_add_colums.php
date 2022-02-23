<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsersAddColums extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->text('short_info')->nullable();
            $table->text('info')->nullable();
            $table->string('web')->nullable();
            $table->string('public_email')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('short_info');
            $table->dropColumn('info');
            $table->dropColumn('web');
            $table->dropColumn('public_email');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
        });
    }
}

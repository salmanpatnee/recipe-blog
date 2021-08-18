<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->foreignId('difficulty_id');
            $table->string('title');
            $table->string('slug');
            $table->text('excerpt');
            $table->text('body');
            $table->string('thumbnail')->nullable();
            $table->unsignedInteger('prep_time');
            $table->unsignedInteger('cook_time');
            $table->unsignedInteger('serves');
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
    }
}

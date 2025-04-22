<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('thumbnail')->nullable();
            $table->string('level')->default('beginner'); // beginner, intermediate, advanced
            $table->string('category'); // python, c, php, etc.
            $table->integer('lessons_count')->default(0);
            $table->integer('challenges_count')->default(0);
            $table->boolean('is_popular')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}

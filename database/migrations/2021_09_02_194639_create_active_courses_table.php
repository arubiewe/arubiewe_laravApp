<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActiveCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('active_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course_id');
            $table->string('course_code');
            $table->string('course_title');
            $table->string('course_unit');
            $table->string('status');
            $table->string('semester');
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
        Schema::dropIfExists('active_courses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('surname');
            $table->string('other_names');
            $table->string('matric_no');
            $table->string('combination');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('department_minor_id');
            $table->string('current_level')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('nationality')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('kin_name')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('image_path')->default('AVATAR.jpg');
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
        Schema::dropIfExists('students');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversityApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('applicant_id');
            $table->string('application_no');
            $table->string('jamb_no')->unique();
            $table->string('surname');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('email')->unique();
            $table->string('mobile_no')->unique();
            $table->string('course');
            $table->string('application_fee_status')->default('not_paid');
            $table->integer('screened_status')->default(0);
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
        Schema::dropIfExists('university_applicants');
    }
}

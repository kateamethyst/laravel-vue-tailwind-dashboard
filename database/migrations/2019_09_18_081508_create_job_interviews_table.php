<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_interviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('interview_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('location')->nullable();
            $table->unsignedBigInteger('applicant_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('job_opening_id');
            $table->unsignedBigInteger('interviewer_id');
            $table->timestamps();

            $table->foreign('applicant_id')->references('id')->on('users');https://bitbucket.org
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('job_opening_id')->references('id')->on('job_openings');
            $table->foreign('interviewer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_interviews');
    }
}

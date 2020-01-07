<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('skype')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('current_employer')->nullable();
            $table->string('current_job_title')->nullable();
            $table->string('current_salary')->nullable();
            $table->string('expected_salary')->nullable();
            $table->json('educational_background')->nullable();
            $table->json('experience')->nullable();
            $table->longText('skill_set')->nullable();
            $table->string('resume_url')->nullable();
            $table->string('cover_letter_url')->nullable();
            $table->string('candidate_zoho_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumes');
    }
}

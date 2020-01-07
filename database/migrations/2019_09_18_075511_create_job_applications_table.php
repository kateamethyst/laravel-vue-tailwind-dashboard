<?php

use App\Models\JobApplication;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('job_opening_id');
            $table->unsignedBigInteger('applicant_id');
            $table->enum('status', [
                JobApplication::STATUS_APPROVED_BY_CLIENT,
                JobApplication::STATUS_ASSOCIATED,
                JobApplication::STATUS_ATTEMPTED_TO_CONTACT,
                JobApplication::STATUS_CONTACT_IN_FUTURE,
                JobApplication::STATUS_CONTACTED,
                JobApplication::STATUS_CONVERTED_EMPLOYEE,
                JobApplication::STATUS_CONVERTED_TEMP,
                JobApplication::STATUS_HIRED,
                JobApplication::STATUS_INTERVIEW_SCHEDULED,
                JobApplication::STATUS_INTERVIEW_TO_BE_SCHEDULED,
                JobApplication::STATUS_JOINED,
                JobApplication::STATUS_JUNK_CANDIDATE,
                JobApplication::STATUS_NEW,
                JobApplication::STATUS_NO_SHOW,
                JobApplication::STATUS_NOT_CONTACTED,
                JobApplication::STATUS_OFFER_ACCEPTED,
                JobApplication::STATUS_OFFER_DECLINED,
                JobApplication::STATUS_OFFER_MADE,
                JobApplication::STATUS_OFFER_WITHDRAWN,
                JobApplication::STATUS_ON_HOLD,
                JobApplication::STATUS_QUALIFIED,
                JobApplication::STATUS_REJECTED,
                JobApplication::STATUS_REJECTED_BY_CLIENT,
                JobApplication::STATUS_REJECTED_FOR_INTERVIEW,
                JobApplication::STATUS_REJECTED_HIRABLED,
                JobApplication::STATUS_SUBMITTED_TO_CLIENT,
                JobApplication::STATUS_TO_BE_OFFERED,
                JobApplication::STATUS_UNQUALIFIED,
                JobApplication::STATUS_WAITING_FOR_EVALUATION
            ]);
            $table->timestamps();

            $table->foreign('job_opening_id')->references('id')->on('job_openings')->onDelete('cascade');
            $table->foreign('applicant_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_applications');
    }
}

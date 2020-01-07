<?php

use App\Models\JobOpening;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOpeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_openings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description');
            $table->integer('number_of_position');
            $table->string('state');
            $table->string('country');
            $table->enum('status', [
                JobOpening::STATUS_ACTIVE,
                JobOpening::STATUS_CANCELLED,
                JobOpening::STATUS_DECLINED,
                JobOpening::STATUS_INACTIVE,
                JobOpening::STATUS_FILLED,
                JobOpening::STATUS_INPROGRESS,
                JobOpening::STATUS_ONHOLD,
                JobOpening::STATUS_SUBMITTED_BY_CLIENT,
                JobOpening::STATUS_WAITING_FOR_APPROVAL
            ]);
            $table->enum('type', [
                JobOpening::TYPE_FULLTIME,
                JobOpening::TYPE_PARTTIME,
                JobOpening::TYPE_TEMPORARY,
                JobOpening::TYPE_CONTRACT,
                JobOpening::TYPE_TRAINING,
                JobOpening::TYPE_FREELANCE
            ]);
            $table->enum('experience_level', [
                JobOpening::LEVEL_FRESHER,
                JobOpening::LEVEL_0TO1YEAR,
                JobOpening::LEVEL_1TO3YEARS,
                JobOpening::LEVEL_4TO5YEARS,
                JobOpening::LEVEL_5YEARSUP
            ]);
            $table->decimal('min_salary');
            $table->decimal('max_salary');
            $table->string('job_zoho_id')->nullable();
            $table->integer('job_industry_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_openings');
    }
}

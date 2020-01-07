<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use App\Models\JobOpening;
use App\Models\JobIndustry;
use Faker\Generator as Faker;

$factory->define(JobOpening::class, function (Faker $faker) {
    return [
        'name' => $faker->jobTitle,
        'description' => $faker->paragraph(),
        'number_of_position' => $faker->randomDigit,
        'state' => $faker->state,
        'country' => $faker->country,
        'status' => 'Active',
        'type' => 'Full Time',
        'experience_level' => '5+ years',
        'min_salary' => $faker->randomNumber(5),
        'max_salary' => $faker->randomNumber(5),
        'job_industry_id' => JobIndustry::all()->random()->id
    ];
});

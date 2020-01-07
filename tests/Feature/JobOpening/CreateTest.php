<?php

declare(strict_types=1);

namespace Tests\Feature\JobOpening;

use Tests\TestCase;
use App\Models\User;
use App\Models\JobOpening;
use App\Models\JobIndustry;
use Illuminate\Foundation\Testing\WithFaker;

class CreateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCanAddJobOpening(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();

        $data = [
          'name' => 'Sample Job',
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
        ]
    }
}

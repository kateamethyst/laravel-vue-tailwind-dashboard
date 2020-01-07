<?php

use App\Models\Client;
use App\Models\JobIndustry;
use App\Models\JobOpening;
use Illuminate\Database\Seeder;

class JobOpeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(JobOpening::class, 100)->create([
          'client_id' => Client::first(),
        ]);
    }
}

<?php

use App\Models\Client;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(); 

        $client = new Client([
            'name' => 'Client Company',
            'website' => 'www.client.com',
            'contact_number' => '09123456789',
            'fax' => '09123456789',
            'about' => $faker->paragraph(3),
        ]);
        
        $client->save();
    }
}

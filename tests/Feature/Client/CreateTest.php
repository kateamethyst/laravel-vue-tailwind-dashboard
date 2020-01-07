<?php

namespace Tests\Feature\Client;

use Tests\TestCase;
use App\Models\User;
use App\Models\Client;

class CreateTest extends TestCase
{
    /**
     * @return void
     */
    public function testCanAddClientValidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();

        $data = [
            'name' => 'Sample Company',
            'website' => 'www.sample_company.com',
            'contact_number' => '09123456789',
            'fax' => '09123456798',
            'about' => 'This is just a test'
        ];
        $response = $this->actingAs($user)->postJson(route('api.clients.store'), $data);
        $responseData = $response->json();

        $this->assertArrayHasKey('data', $responseData, json_encode($responseData));
        $this->assertEquals('Sample Company', $responseData['data']['name']);
        $this->assertResourceCreated($response, new Client());
    }

    /**
     * @return void
     */
    public function testCanNotAddClientInvalidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();

        $data = [
            'website' => 'www.sample_company.com',
            'contact_number' => '09123456789',
            'fax' => '09123456789',
            'about' => 'This is just a test'
        ];
        $response = $this->actingAs($user)->postJson(route('api.clients.store'), $data);
        $responseData = $response->json();

        $this->assertArrayHasKey('errors', $responseData);
        $this->assertErrorForFieldExists($responseData['errors'], 'name', 'The name field is required.');
    }
}

<?php

namespace Tests\Feature\Client;

use Tests\TestCase;
use App\Models\User;
use App\Models\Client;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModifyTest extends TestCase
{
    /**
     * @return void
     */
    public function testCanUpdateClientWithValidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $client = Client::first();

        $data = [
            'name' => 'Sample Client'
        ];

        $response = $this->actingAs($user)->patchJson(route('api.clients.update', ['client' => $client]), $data);
        $responseData = $response->json();

        $this->assertArrayHasKey('data', $responseData);
        $this->assertEquals('Sample Client', $responseData['data']['name']);
    }

    public function testCannotUpdateClientWithInvalidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $client = Client::first();

        $data = [
            'name' => 12312321
        ];

        $response = $this->actingAs($user)->patchJson(route('api.clients.update', ['client' => $client]), $data);
        $responseData = $response->json();

        $this->assertArrayHasKey('errors', $responseData);
        $this->assertEquals('The given data was invalid.', $responseData['message']);
        $this->assertErrorForFieldExists($responseData['errors'], 'name', 'The name must be a string.');
    }

    public function testCanDeleteClient(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $client = Client::first();

        $response = $this->actingAs($user)->deleteJson(route('api.clients.destroy', [
            'client' => $client
        ]));

        $this->assertResourceDeleted($response, new Client());
    }
}

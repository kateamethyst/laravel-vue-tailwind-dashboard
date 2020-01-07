<?php

namespace Tests\Feature\Client;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListingTest extends TestCase
{
    /**
     * @return void
     */
    public function testCanGetListOfClients(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $response = $this->actingAs($user)->getJson(route('api.clients.index'));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                []
            ],
            'links' => [],
            'meta' => []
        ]);

        $data = $response->json();

        $this->assertEquals('Client Company', $data['data'][0]['name']);
    }
}

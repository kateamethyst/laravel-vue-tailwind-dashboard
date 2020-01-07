<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;

class ListingTest extends TestCase
{
    /**
     * @return void
     */
    public function testCanGetListOfUsers(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();

        $response = $this->actingAs($user)->getJson(route('api.users.index'));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                [],
            ],
            'links' => [],
            'meta' => []
        ]);

        $data = $response->json();
        
        $this->assertEquals('Admin', $data['data'][0]['first_name']);
    }
}

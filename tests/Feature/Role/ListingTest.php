<?php

namespace Tests\Feature\Role;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListingTest extends TestCase
{
    /**
     * @return void
     */
    public function testCanGetListOfRoles(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $response = $this->actingAs($user)->getJson(route('api.roles.index'));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                [],
            ],
            'links' => [],
            'meta' => []
        ]);

        $data = $response->json();

        $this->assertEquals('SuperAdmin', $data['data'][0]['name']);
    }

    /**
     * @return void
     */
    public function testCanGetListOfRolesWithPermissions(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $response = $this->actingAs($user)->getJson(route('api.roles.index', [
            'includes' => [
                'permissions'
            ]
        ]));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                []
            ],
            'links' => [],
            'meta' => []
        ]);

        $data = $response->json();
        
        $this->assertArrayHasKey('permissions', $data['data'][0]);
    }
}

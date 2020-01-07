<?php

namespace Tests\Feature\Permission;

use Tests\TestCase;
use App\Models\User;

class ListingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCanGetListOfPermissions(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $response = $this->actingAs($user)->getJson(route('api.permissions.index'));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                [],
            ],
            'links' => [],
            'meta' => []
        ]);

        $data = $response->json();

        $this->assertEquals('superadmin-manage-clients', $data['data'][0]['name']);
    }

    /**
     * @return void
     */
    public function testCanGetListOfPermissionsWithRole(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $response = $this->actingAs($user)->getJson(route('api.permissions.index', [
            'includes' => [
                'roles'
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

        $this->assertArrayHasKey('roles', $data['data'][0]);
    }
}

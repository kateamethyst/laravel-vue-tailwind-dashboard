<?php

namespace Tests\Feature\Permission;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;

class CreateTest extends TestCase
{
    /**
     * @return void
     */
    public function testCanAddPermissionWithValidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $data = [
            'name' => 'sample-manage',
            'role_id' => Role::first()->id
        ];
        
        $response = $this->actingAs($user)->postJson(route('api.permissions.store'), $data);
        $responseData = $response->json();

        $this->assertArrayHasKey('data', $responseData, json_encode($responseData));
        $this->assertEquals('sample-manage', $responseData['data']['name']);
        $this->assertResourceCreated($response, new Permission());
    }

    /** 
     * @return void
     */
    public function testCanNotAddPermissionWithInvalidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $data = [
            'name' => 'superadmin-manage-clients',
            'role_id' => Role::first()->id
        ];

        $response = $this->actingAs($user)->postJson(route('api.permissions.store'), $data);
        $response->assertStatus(422);
        $responseData = $response->json();
    }
}

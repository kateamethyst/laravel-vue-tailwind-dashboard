<?php

namespace Tests\Feature\Role;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModifyTest extends TestCase
{
    /**
     * @return void
     */
    public function testCanUpdateRoleWithValidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $role = Role::first();

        $data = [
            'name' => 'SuperAdmin1'
        ];

        $response = $this->actingAs($user)->patchJson(route('api.roles.update', ['role' => $role]), $data);
        $responseData = $response->json();

        $this->assertArrayHasKey('data', $responseData);
        $this->assertEquals('SuperAdmin1', $responseData['data']['name']);
        $this->assertResourceUpdated($response, new Role());
    }

    /**
     * @return void
     */
    public function testCanNotUpdateRoleWithInvalidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $role = Role::first();

        $data = [
            'name' => 'Admin'
        ];

        $response = $this->actingAs($user)->patchJson(route('api.roles.update', ['role' => $role]), $data);
        $responseData = $response->json();

        $this->assertArrayHasKey('errors', $responseData);
        $this->assertErrorForFieldExists($responseData['errors'], 'name', 'The name has already been taken.');
    }

    public function testCanDeleteRole(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $role = Role::first();

        $response = $this->actingAs($user)->deleteJson(route('api.roles.destroy', ['role' => $role]));

        $this->assertResourceDeleted($response, new Role());
    }
}

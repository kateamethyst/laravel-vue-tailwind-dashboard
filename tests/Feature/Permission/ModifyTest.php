<?php

namespace Tests\Feature\Permission;

use Tests\TestCase;
use App\Models\User;
use App\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class ModifyTest extends TestCase
{
    /**
     * @return void
     */
    public function testCanUpdatePermissionWithValidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $permission = Permission::first();

        $data = [
            'name' => 'test-permission'
        ];

        $response = $this->actingAs($user)->patchJson(route('api.permissions.update', ['permission' => $permission]), $data);

        $response->assertStatus(Response::HTTP_ACCEPTED);
        $responseData = $response->json();

        $this->assertArrayHasKey('data', $responseData);
        $this->assertEquals('test-permission', $responseData['data']['name']);
    }

    public function testCanNotUpdatePermissionWithInvalidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $permission = Permission::first();

        $data = [
            'name' => 'superadmin-manage-clientindustries'
        ];
        
        $response = $this->actingAs($user)->patchJson(route('api.permissions.update', ['permission' => $permission]), $data);
        $response->assertStatus(422);
        $responseData = $response->json();

        $this->assertArrayHasKey('errors', $responseData);
        $this->assertEquals('The given data was invalid.', $responseData['message']);
        $this->assertErrorForFieldExists($responseData['errors'], 'name', 'The name has already been taken.');
    }
}

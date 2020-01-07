<?php

namespace Tests\Feature\Role;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;

class CreateTest extends TestCase
{
    /**
     * @return void
     */
    public function testCanAddRoleWithValidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        
        $data = [
            'name' => 'Sample'
        ];
        $response = $this->actingAs($user)->postJson(route('api.roles.store'), $data);
        $responseData = $response->json();

        $this->assertArrayHasKey('data', $responseData, json_encode($responseData));
        $this->assertEquals('Sample', $responseData['data']['name']);
        $this->assertResourceCreated($response, new Role());
    }

    /**
     * @return void
     */
    public function testCanNotAddRoleWithInvalidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $data = [
            'name' => 'SuperAdmin'
        ];
        
        $response = $this->actingAs($user)->postJson(route('api.roles.store'), $data); 
        $response->assertStatus(422);
        $responseData = $response->json();

        $this->assertArrayHasKey('errors', $responseData);
        $this->assertErrorForFieldExists($responseData['errors'], 'name', 'The name has already been taken.');
    }
}

<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateTest extends TestCase
{
    /**
     * @return void
     */
    public function testCanAddAdminWithValidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        
        $data = [
            'first_name' => 'Test',
            'last_name' => 'Admin',
            'email' => 'test_admin@intellishipper.com',
            'password' => 'test123'
        ];
        $response = $this->actingAs($user)->postJson(route('api.users.store'), $data);
        $responseData = $response->json();

        $this->assertArrayHasKey('data', $responseData, json_encode($responseData));
        $this->assertEquals('test_admin@intellishipper.com', $responseData['data']['email']);
        $this->assertEquals('superadmin', $responseData['data']['type']);
        $this->assertResourceCreated($response, new User());
    }

    /**
     * @return void
     */
    public function testCanAddStaffWithValidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();

        $data = [
            'first_name' => 'Test',
            'last_name' => 'Staff',
            'email' => 'test_staff@intellishipper.com',
            'password' => 'test123',
            'type' => 'admin'
        ];

        $response = $this->actingAs($user)->postJson(route('api.users.store'), $data);
        $responseData = $response->json();

        $this->assertArrayHasKey('data', $responseData, json_encode($responseData));
        $this->assertEquals('test_staff@intellishipper.com', $responseData['data']['email']);
        $this->assertEquals('admin', $responseData['data']['type']);
        $this->assertResourceCreated($response, new User());
    }

    /**
     * @return void
     */
    public function testCanNotAddWithInvalidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();

        $data = [
            'first_name' => 'Test',
            'last_name' => 'Test',
            'email' => 'test',
            'password' => 'test123',
            'type' => 'admin'
        ];

        $response = $this->actingAs($user)->postJson(route('api.users.store'), $data);
        $response->assertStatus(422);
        $responseData = $response->json();

        $this->assertArrayHasKey('errors', $responseData);
        $this->assertErrorForFieldExists($responseData['errors'], 'email', 'The email must be a valid email address.');
    }
}
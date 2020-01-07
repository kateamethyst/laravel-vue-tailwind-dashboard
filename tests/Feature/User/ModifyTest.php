<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModifyTest extends TestCase
{
    /**
     * @return void
     */
    public function testCanUpdateUserWithValidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $user = User::first();
        
        $data = [
            'first_name' => 'Test'
        ];

        $response = $this->actingAs($user)->patchJson(route('api.users.update', ['user' => $user]), $data);
        $responseData = $response->json();

        $this->assertArrayHasKey('data', $responseData);
        $this->assertEquals('Test', $responseData['data']['first_name']);
    }

    /**
     * @return void
     */
    public function testCanNotUpdateUserWithInvalidData(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $user = User::first();

        $data = [
            'email' => 'test'
        ];

        $response = $this->actingAs($user)->patchJson(route('api.users.update', ['user' => $user]), $data);
        $responseData = $response->json();

        $this->assertArrayHasKey('errors', $responseData);
        $this->assertEquals('The given data was invalid.', $responseData['message']);
        $this->assertErrorForFieldExists($responseData['errors'], 'email', 'The email must be a valid email address.');
    }

    /**
     * @return void
     */
    public function testCanDeleteOtherUsers(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $userToDelete = User::first();

        $response = $this->actingAs($user)->deleteJson(route('api.users.destroy', ['user' => $userToDelete]));

        $this->assertResourceDeleted($response, new User());
    }
}

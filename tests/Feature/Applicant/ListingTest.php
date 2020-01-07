<?php

namespace Tests\Feature\Applicant;

use Tests\TestCase;
use App\Models\User;

class ListingTest extends TestCase
{
    public function testCanGetListOfApplicant(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $response = $this->actingAs($user)->getJson(route('api.candidates.index'));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                []
            ],
            'links' => [],
            'meta' => []
        ]);

        $data = $response->json();

        $this->assertEquals('Candidate', $data['data'][0]['first_name']);
    }

    public function testCanGetSingleApplicant(): void
    {
        $user = User::whereEmail('admin@siocareer.com')->first();
        $applicant = User::whereType('candidate')->first();

        $response = $this->actingAs($user)->getJson(route('api.candidates.show', ['candidate' => $applicant->id]));

        $response->assertStatus(200);
        $data = $response->json();

        $this->assertEquals('candidate', $data['data']['type']);
        $this->assertArrayHasKey('resume', $data['data']);
    }
}

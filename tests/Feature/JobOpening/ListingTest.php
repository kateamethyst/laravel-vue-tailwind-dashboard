<?php

declare(strict_types=1);

namespace Tests\Feature\JobOpening;

use Tests\TestCase;
use App\Models\User;
use App\Models\JobOpening;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListingTest extends TestCase
{
    /**
     * A test case for get list of jobs.
     *
     * @return void
     */
    public function testCanGetListOfJobOpenings(): void
    {
        $response = $this->getJson(route('api.jobs.index'));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                []
            ],
            'links' => [],
            'meta' => []
        ]);
    }

    /**
     * A test case for get single job.
     *
     * @return void
     */
    public function testCanGetSingleJobOpening(): void
    {
        $jobOpening = JobOpening::first();
        $response = $this->getJson(route('api.jobs.show', ['job' => $jobOpening->id]));

        $response->assertStatus(200);
        $data = $response->json();
        $this->assertArrayHasKey('name', $data['data']);
    }
}

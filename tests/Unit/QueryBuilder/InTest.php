<?php

declare(strict_types=1);

namespace Tests\Unit\QueryBuilder;

use Tests\TestCase;
use App\Models\User;
use App\Services\Builder\QueryBuilder;

class InTest extends TestCase
{
    /**
     * A basic unit test for query builder in
     *
     * @return void
     */
    public function testCanFilterIn(): void
    {
        $request = request();

        $request->merge([
            'filter' => [
                'email' => [
                    'in' => [
                        'admin@siocareer.com',
                        'staff@siocareer.com'
                    ]
                ]
            ]
        ]);

        $response = QueryBuilder::createFromRequest(new User(), $request, [])->get();

        $this->assertNotEmpty($response);
        $this->assertEquals(2, count($response));
    }

    /**
     * A basic unit test for query builder not in
     *
     * @return void
     */
    public function testCanFilterNotIn(): void
    {
        $request = request();

        $request->merge([
            'filter' => [
                'email' => [
                    'not_in' => [
                        'admin@siocareer.com',
                        'staff@siocareer.com',
                        'candidate@siocareer.com'
                    ]
                ]
            ]
        ]);

        $response = QueryBuilder::createFromRequest(new User(), $request, [])->get();

        $this->assertNotEmpty($response);
        $this->assertEquals(1, count($response));
        $this->assertEquals('client@siocareer.com', $response[0]['email']);
    }
}

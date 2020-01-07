<?php

declare(strict_types=1);

namespace Tests\Unit\QueryBuilder;

use Tests\TestCase;
use App\Models\User;
use App\Services\Builder\QueryBuilder;

class StartsTest extends TestCase
{
    /**
     * A test case for query builder starts with.
     *
     * @return void
     */
    public function testCanFilterStartsWith(): void
    {
        $request = request();

        $request->merge([
            'filter' => [
                'email' => [
                    'starts_with' => 'client'
                ]
            ]
        ]);

        //$response = QueryBuilder::createFromRequest(new User(), $request, [])->get();
        
        //$this->assertNotEmpty($response);
        //$this->assertEquals(1, count($response));
        //$this->assertEquals('client@siocareer.com', $response[0]['email']);
    }

    /**
     * A test case for query builder not starts with.
     *
     * @return void
     */
    public function testCanFilterNotStartsWith(): void
    {
        $request = request();

        $request->merge([
            'filter' => [
                'email' => [
                    'not_starts_with' => 'client'
                ]
            ]
        ]);

        //$response = QueryBuilder::createFromRequest(new User(), $request, [])->get();
        
        //$this->assertNotEmpty($response);
        //$this->assertGreaterThan(1, count($response));
    }
}

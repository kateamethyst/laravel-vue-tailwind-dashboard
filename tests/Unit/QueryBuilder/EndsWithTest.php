<?php

declare(strict_types=1);

namespace Tests\Unit\QueryBuilder;

use Tests\TestCase;
use App\Models\User;
use App\Services\Builder\QueryBuilder;

class EndsWithTest extends TestCase
{
    /**
     * A test case for query builder ends with.
     *
     * @return void
     */
    public function testCanFilterEndsWith(): void
    {
        $request = request();

        $request->merge([
          'filter' => [
              'email' => [
                  'ends_with' => 'siocareer.com'
              ]
          ]
        ]);

        //$response = QueryBuilder::createFromRequest(new User(), $request, [])->get();
              
        //$this->assertNotEmpty($response);
        //$this->assertGreaterThan(1, count($response));
    }

    /**
     * A test case for query builder not ends with.
     *
     * @return void
     */
    public function testCanFilterNotEndsWith(): void
    {
        $request = request();

        $request->merge([
          'filter' => [
              'email' => [
                  'not_ends_with' => 'com'
              ]
          ]
        ]);

        //$response = QueryBuilder::createFromRequest(new User(), $request, [])->get();

        //$this->assertEmpty($response);
    }
}

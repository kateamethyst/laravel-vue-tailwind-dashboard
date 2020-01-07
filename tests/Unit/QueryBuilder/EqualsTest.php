<?php

declare(strict_types=1);

namespace Tests\Unit\QueryBuilder;

use Tests\TestCase;
use App\Models\User;
use App\Services\Builder\QueryBuilder;

class EqualsTest extends TestCase
{
    /**
     * A test case for query builder equals
     *
     * @return void
     */
    public function testCanFilterEquals(): void
    {
        $request = request();

        $request->merge([
          'filter' => [
              'email' => [
                  'equals' => 'client@siocareer.com'
              ]
          ]
        ]);

        $response = QueryBuilder::createFromRequest(new User(), $request, [])->get();
      
        $this->assertNotEmpty($response);
        $this->assertEquals(1, count($response));
        $this->assertEquals('client@siocareer.com', $response[0]['email']);
    }

    /**
     * A test case for query builder not equals
     *
     * @return void
     */
    public function testCanFilterNotEquals(): void
    {
        $request = request();

        $request->merge([
          'filter' => [
              'email' => [
                  'not_equals' => 'client@siocareer.com'
              ]
          ]
        ]);

        $response = QueryBuilder::createFromRequest(new User(), $request, [])->get();
      
        $this->assertNotEmpty($response);
        $this->assertGreaterThan(1, count($response));
    }
}

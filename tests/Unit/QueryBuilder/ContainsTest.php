<?php

declare(strict_types=1);

namespace Tests\Unit\QueryBuilder;

use Tests\TestCase;
use App\Models\User;
use App\Services\Builder\QueryBuilder;

class ContainsTest extends TestCase
{
    /**
     * A test case for query builder contains.
     *
     * @return void
     */
    public function testCanFilterContains(): void
    {
      $request = request();

      $request->merge([
          'filter' => [
              'email' => [
                  'contains' => 'client@siocareer.com'
              ]
          ]
      ]);

      //$response = QueryBuilder::createFromRequest(new User(), $request, [])->first();

      //$this->assertNotEmpty($response);
      //$this->assertEquals('client@siocareer.com', $response['email']);
    }

    /**
     * A test case for query builder not contains.
     *
     * @return void
     */
    public function testCanFilterNotContains(): void
    {
      $request = request();

      $request->merge([
        'filter' => [
            'email' => [
                'not_contains' => 'admin'
            ]
        ]
      ]);
      
      //$response = QueryBuilder::createFromRequest(new User(), $request, [])->get();

      //$this->assertEmpty($response);
    }
}

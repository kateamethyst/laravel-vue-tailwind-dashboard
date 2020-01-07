<?php

namespace Tests;

use Illuminate\Support\Str;
use Tests\CreatesApplication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Testing\TestResponse;

abstract class BareTestCase extends TestCase
{
    use CreatesApplication;

    public function assertResourceCreated(TestResponse $response, Model $model): void
    {
        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertEquals(strtolower(Str::plural(getModelName($model))) . '.itemCreated', $response->json()['code']);
        $this->assertEquals(ucfirst(getModelName($model)) . ' created', $response->json()['message']);
    }

    public function assertResourceDeleted(TestResponse $response, Model $model): void
    {
        $response->assertStatus(Response::HTTP_OK);
        $this->assertEquals([
            'code' => strtolower(Str::plural(getModelName($model))) . '.itemDeleted',
            'message' => ucfirst(getModelName($model)) . ' deleted',
        ], $response->getOriginalContent());
    }

    public function assertResourceUpdated(TestResponse $response, Model $model): void
    {
        $response->assertStatus(Response::HTTP_ACCEPTED);
        $this->assertEquals(strtolower(Str::plural(getModelName($model))). '.itemUpdated', $response->json()['code']);
        $this->assertEquals(ucfirst(getModelName($model)) . ' updated', $response->json()['message']);
    }

    public function assertErrorForFieldExists(array $errors, string $field, string $message = null): void
    {
        $fieldErrors = collect($errors);

        $this->assertNotEmpty($fieldErrors);

        if ($message) {
            $errorMessage = $fieldErrors[$field][0];

            $this->assertEquals($message, $errorMessage);
        }
    }
}
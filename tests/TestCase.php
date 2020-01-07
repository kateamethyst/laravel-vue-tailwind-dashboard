<?php

namespace Tests;

use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

abstract class TestCase extends BareTestCase
{
    use DatabaseTransactions{
        beginDatabaseTransaction as beginDatabaseTransactionTrait;
    }

    public static $databaseMigrated = false;

    public function beginDatabaseTransaction(): void
    {
        self::$databaseMigrated = true;
        touch(config('database.connections.sqlite.database'));
        $this->artisan('migrate:fresh', ['--force' => true]);
        $this->artisan('db:seed');
        $this->beginDatabaseTransactionTrait();
    }

    public function actingAs(UserContract $user, $driver = null)
    {
        $token = Auth::guard('api')->fromUser($user);

        $this->withHeaders(['Authorization' => 'Bearer ' . $token]);

        return $this->be($user, $driver);
    }
}

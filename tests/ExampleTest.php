<?php

namespace Astrotomic\LaravelEloquentUuid\Tests;

use Astrotomic\LaravelEloquentUuid\LaravelEloquentUuidServiceProvider;
use Orchestra\Testbench\TestCase;

class ExampleTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [LaravelEloquentUuidServiceProvider::class];
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}

<?php

namespace Astrotomic\LaravelEloquentUuid\Tests;

use Orchestra\Testbench\TestCase;
use Astrotomic\LaravelEloquentUuid\LaravelEloquentUuidServiceProvider;

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

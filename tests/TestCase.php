<?php

namespace Tests;

use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use League\Flysystem\Config;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        if (config('app.env') !== 'testing') {
            $this->fail('Not in testing environment according to APP_ENV. Aborting');
            die(1);
        }


        $this->artisan('migrate:refresh');
//                $this->withoutExceptionHandling();
        $this->withExceptionHandling();
    }
}

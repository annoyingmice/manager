<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $token;

    /**
     * Indicates whether the default seeder should run before each test.
     *
     * @var bool
     */
    protected $seed = true;

    protected $baseV1 = '/api/v1';

    // @TODO
    // Should run artisan in test env
    // $this->artisan('app:rsa');

    protected function setUp(): void
    {
        parent::setUp();
        $this->token = $this->v1GetToken();
    }

    private function v1GetToken()
    {
        $response = $this->postJson("$this->baseV1/verify", ['otp' => '123456']);
        return $response->json()['data']['access_token'];
    }
}

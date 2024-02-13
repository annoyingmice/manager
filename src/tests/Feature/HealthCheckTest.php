<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HealthCheckTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_should_ok_v1(): void
    {
        $response = $this->get("$this->baseV1/healthcheck");

        $response->assertStatus(200);
    }
}

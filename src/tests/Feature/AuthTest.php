<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use stdClass;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * It should test login successfully
     */
    public function test_should_login_success(): void
    {
        $response = $this->postJson("$this->baseV1/login", ['phone' => '1234']);
        $response->assertStatus(200);
    }

    public function test_should_login_fail_credential(): void
    {
        $response = $this->postJson("$this->baseV1/login", []);
        $response->assertStatus(422);
    }

    public function test_should_login_fail_account_not_found(): void
    {
        $response = $this->postJson("$this->baseV1/login", ['phone' => '12345']);
        $response->assertStatus(404);
    }

    public function test_should_verify_otp(): void
    {
        $response = $this->postJson("$this->baseV1/verify", ['otp' => '123456']);
        $response->assertStatus(200);
    }

    public function test_should_fail_verify_otp(): void
    {
        $response = $this->postJson("$this->baseV1/verify", ['otp' => '123455']);
        $response->assertStatus(404);
    }

    public function test_should_get_current_auth_user(): void
    {
        $response = $this->getJson("$this->baseV1/auth", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_fail_to_get_current_auth_user(): void
    {
        $token = '';
        $response = $this->getJson("$this->baseV1/auth", ['Authorization' => "Bearer $token"]);
        $response->assertStatus(500);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_list_roles(): void
    {
        $response = $this->get("$this->baseV1/roles?limit=1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_create_role(): void
    {
        $response = $this->postJson("$this->baseV1/roles", ['name' => 'test', 'owner' => null], ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(201)
            ->assertJsonIsObject();
    }

    public function test_should_update_role(): void
    {
        $response = $this->putJson("$this->baseV1/roles/1", ['name' => 'test1', 'owner' => null], ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_show_role(): void
    {
        $response = $this->get("$this->baseV1/roles/1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_delete_role(): void
    {
        $response = $this->get("$this->baseV1/roles/1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }
}

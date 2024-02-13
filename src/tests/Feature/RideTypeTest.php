<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RideTypeTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_list_ride_types(): void
    {
        $response = $this->get("$this->baseV1/ride-types?limit=1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_create_ride_type(): void
    {
        $response = $this->postJson("$this->baseV1/ride-types", ['name' => 'test'], ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(201)
            ->assertJsonIsObject();
    }

    public function test_should_update_ride_types(): void
    {
        $response = $this->putJson("$this->baseV1/ride-types/1", ['name' => 'test1'], ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_show_ride_types(): void
    {
        $response = $this->get("$this->baseV1/ride-types/1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_delete_ride_types(): void
    {
        $response = $this->get("$this->baseV1/ride-types/1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }
}

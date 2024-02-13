<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RideTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_list_rides(): void
    {
        $response = $this->get("$this->baseV1/rides?limit=1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_create_ride(): void
    {
        $response = $this->postJson("$this->baseV1/rides", 
        [
            'name' => 'test',
            'company_id' => '1',
            'ride_type_id' => '1',
            'meta_data' => json_encode(['field' => 'test']),
        ], ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(201)
            ->assertJsonIsObject();
    }

    public function test_should_update_ride(): void
    {
        $response = $this->putJson("$this->baseV1/rides/1", 
        [
            'name' => 'test',
            'company_id' => '1',
            'ride_type_id' => '1',
            'meta_data' => json_encode(['field' => 'test']),
        ], ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_show_ride(): void
    {
        $response = $this->get("$this->baseV1/rides/1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_delete_ride(): void
    {
        $response = $this->get("$this->baseV1/rides/1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }
}

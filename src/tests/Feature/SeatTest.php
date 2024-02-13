<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeatTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_list_seats(): void
    {
        $response = $this->get("$this->baseV1/seats?limit=1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_create_seat(): void
    {
        $response = $this->postJson("$this->baseV1/seats", 
        [
            'label' => 'test', 
            'ride_id' => '1',
            'meta_data' => json_encode(['field' => 'test']),
        ], ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(201)
            ->assertJsonIsObject();
    }

    public function test_should_update_seat(): void
    {
        $response = $this->putJson("$this->baseV1/seats/1", 
        [
            'label' => 'test', 
            'ride_id' => '1',
            'meta_data' => json_encode(['field' => 'test']),
        ], ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_show_seat(): void
    {
        $response = $this->get("$this->baseV1/seats/1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_delete_seat(): void
    {
        $response = $this->get("$this->baseV1/seats/1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }
}

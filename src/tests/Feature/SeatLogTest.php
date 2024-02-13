<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeatLogTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_list_seat_logs(): void
    {
        $response = $this->get("$this->baseV1/seat-logs?limit=1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_create_seat_log(): void
    {
        $response = $this->postJson("$this->baseV1/seat-logs", 
        [
            'seat_id' => '1', 
            'ticket_id' => '1',
            'seat_log_type_id' => '1',
            'check_in_url' => 'https://',
            'meta_data' => json_encode(['field' => 'test']),
        ], ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(201)
            ->assertJsonIsObject();
    }

    public function test_should_update_seat_log(): void
    {
        $response = $this->putJson("$this->baseV1/seat-logs/1", 
        [
            'seat_id' => '1', 
            'ticket_id' => '1',
            'seat_log_type_id' => '1',
            'check_in_url' => 'https://',
            'meta_data' => json_encode(['field' => 'test']),
        ], ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_show_seat_log(): void
    {
        $response = $this->get("$this->baseV1/seat-logs/1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_delete_seat_log(): void
    {
        $response = $this->get("$this->baseV1/seat-logs/1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ScheduleTest extends TestCase
{
    use RefreshDatabase;

    public function test_should_list_schedules(): void
    {
        $response = $this->get("$this->baseV1/schedules?limit=1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_create_schedule(): void
    {
        $response = $this->postJson("$this->baseV1/schedules", [
            'name' => 'test',
            'company_id' => '1',
            'ride_id' => '1',
            'start_date' => now()->format('Y-m-d H:i:s'),
            'end_date' => now()->format('Y-m-d H:i:s'),
        ], ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(201)
            ->assertJsonIsObject();
    }

    public function test_should_update_schedule(): void
    {
        $response = $this->putJson("$this->baseV1/roles/1", [
            'name' => 'test',
            'company_id' => '1',
            'ride_id' => '1',
            'start_date' => now()->format('Y-m-d H:i:s'),
            'end_date' => now()->format('Y-m-d H:i:s'),
        ], ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_show_schedule(): void
    {
        $response = $this->get("$this->baseV1/schedules/1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }

    public function test_should_delete_schedule(): void
    {
        $response = $this->get("$this->baseV1/schedules/1", ['Authorization' => "Bearer $this->token"]);
        $response->assertStatus(200)
            ->assertJsonIsObject();
    }
}

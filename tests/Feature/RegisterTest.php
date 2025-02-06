<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_register(): void
    {
        $data=[
            'name' => 'test',
            'email'=>'test@example.com',
            'password' => '123456'
        ];
        $response = $this->postJson('/api/register', $data);

        $response->assertStatus(200);
    }
    public function test_login(): void
    {
        $data=[
            'email'=>'test@example.com',
            'password' => '123456'
        ];
        $response = $this->postJson('/api/login', $data);

        $response->assertStatus(200);
    }
}

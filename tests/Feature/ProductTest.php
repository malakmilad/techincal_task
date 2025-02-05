<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->post('/products', [
            'name' => 'Laptop',
            'price' => 1000,
            'quantity' => 10,
        ]);
        $response->assertStatus(201);
    }
}

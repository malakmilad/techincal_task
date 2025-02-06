<?php
namespace Tests\Feature;

use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_add_new_product(): void
    {
        $user = \App\Models\User::factory()->create([
            'name'     => 'malak',
            'email'    => 'malak@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $token = $user->createToken('token')->plainTextToken;

        $productData = [
            'name'        => 'Test',
            'price'       => 1000,
            'quantity'    => 5,
            'category_id' => 1,
        ];

        $response = $this->postJson('/api/products', $productData, [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('products', ['name' => $productData['name']]);

    }
}

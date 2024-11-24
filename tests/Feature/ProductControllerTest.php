<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductControllerTest extends TestCase
{
    public function test_products_can_be_indexed()
{
    $response = $this->get('/api/products');
    $response->assertStatus(200);
}

    public function test_product_can_be_shown()
    {
        $product = Product::factory()->create();
        $response = $this->get('/api/products/' . $product->id);
        $response->assertStatus(200);
    }

    public function test_product_can_be_stored()
    {
        $data = [
            'sku' => '12345',
            'name' => 'Test Product',
            'price' => 99.99,
        ];
        $response = $this->post('/api/products', $data);
        $response->assertStatus(201);
    }

    public function test_product_can_be_updated()
    {
        $product = Product::factory()->create();
        $data = ['name' => 'Updated Product'];
        $response = $this->put( '/api/products/' . $product->id, $data);
        $response->assertStatus(200);
    }

    public function test_product_can_be_destroyed()
    {
        $product = Product::factory()->create();
        $response = $this->delete('/api/products/' . $product->id);
        $response->assertStatus(204);
    }

}

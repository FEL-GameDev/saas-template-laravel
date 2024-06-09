<?php

namespace ProductModels;

use App\DTO\ProductModel\ProductModelCreateDTO;
use App\Services\ProductModel\ProductModelCreate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\HasAuthenticatedUser;

class ProductModelsTest extends TestCase
{

    use RefreshDatabase, HasAuthenticatedUser;
    public function testManageProductModels()
    {
        $response = $this
            ->actingAs($this->actingAsUser(['is_owner' => true]))
            ->get('/products');

        $response->assertStatus(200);
    }

    public function testProductModelCreate()
    {
        $response = $this
            ->actingAs($this->actingAsUser(['is_owner' => true]))
            ->get('/product/create');

        $response->assertStatus(200);
    }

    public function testProductModelCreateStore()
    {
        $response = $this
            ->actingAs($this->actingAsUser(['is_owner' => true]))
            ->post('/product', [
                'name' => 'Test Product',
                'description' => 'Test Description',
            ]);

        $response->assertStatus(200);
    }

    public function testProductModelUpdate()
    {
        $user = $this->actingAsUser(['is_owner' => true]);
        auth()->login($user);
        $productModelCreateDTO = ProductModelCreateDTO::create(
            name: 'Test Product',
            description: 'Test Description',
        );
        $productModel = ProductModelCreate::create($productModelCreateDTO);

        $response = $this
            ->from("/product/{$productModel->id}/edit")
            ->patch("/product/{$productModel->id}", [
                'name' => 'Test Product Updated',
                'description' => 'Test Description Updated',
                'product_id' => $productModel->id,
            ]);
        $productModel->refresh();

        $response->assertStatus(200);
        $this->assertEquals('Test Product Updated', $productModel->name);
    }

    public function testProductModelDelete()
    {
        $user = $this->actingAsUser(['is_owner' => true]);
        auth()->login($user);
        $productModelCreateDTO = ProductModelCreateDTO::create(
            name: 'Test Product',
            description: 'Test Description',
        );
        $productModel = ProductModelCreate::create($productModelCreateDTO);

        $response = $this
            ->from("/products")
            ->delete("/product/{$productModel->id}");

        $response->assertStatus(200);
    }
}

<?php

namespace Category;

use App\DTO\Category\CategoryCreateDTO;
use App\Services\Category\CategoryCreate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\HasAuthenticatedUser;

class CategoryTest extends TestCase
{
    use RefreshDatabase, HasAuthenticatedUser;
    public function testManageCategories()
    {
        $response = $this
            ->actingAs($this->actingAsUser(['is_owner' => true]))
            ->get('/categories');

        $response->assertStatus(200);
    }

    public function testCategoryCreate()
    {
        $response = $this
            ->actingAs($this->actingAsUser(['is_owner' => true]))
            ->get('/categories/create');

        $response->assertStatus(200);
    }

    public function testCategoryCreateStore()
    {
        $response = $this
            ->actingAs($this->actingAsUser(['is_owner' => true]))
            ->post('/categories', [
                'name' => 'Test Category',
                'description' => 'Test Description',
            ]);

        $response->assertStatus(200);
    }

    public function testCategoryUpdate()
    {
        $user = $this->actingAsUser(['is_owner' => true]);
        auth()->login($user);
        $categoryCreateDTO = CategoryCreateDTO::create(
            name: 'Test Category',
            description: 'Test Description',
        );
        $category = CategoryCreate::create($categoryCreateDTO);

        $response = $this
            ->from("/categories/{$category->id}/edit")
            ->put("/categories/{$category->id}", [
                'name' => 'Test Category',
                'description' => 'Test Description',
                'category_id' => $category->id,
            ]);

        $response->assertStatus(200);
    }

    public function testCategoryDelete()
    {
        $user = $this->actingAsUser(['is_owner' => true]);
        auth()->login($user);
        $categoryCreateDTO = CategoryCreateDTO::create(
            name: 'Test Category',
            description: 'Test Description',
        );
        $category = CategoryCreate::create($categoryCreateDTO);

        $response = $this
            ->from("/categories")
            ->delete("/categories/{$category->id}");

        $response->assertStatus(200);
    }
}

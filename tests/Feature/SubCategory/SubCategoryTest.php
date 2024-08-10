<?php

namespace SubCategory;

use App\DTO\Category\CategoryCreateDTO;
use App\DTO\Category\SubCategory\SubCategoryCreateDTO;
use App\Services\Category\CategoryCreate;
use App\Services\SubCategory\SubCategoryCreate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;
use Tests\Traits\HasAuthenticatedUser;

class SubCategoryTest extends TestCase
{
    use RefreshDatabase, HasAuthenticatedUser;

    public function testSubCategoriesCanBeCreated()
    {
        $subCategories = ['name' => 'Sub Category', 'description' => 'Sub Description'];

        $response = $this
            ->actingAs($this->actingAsUser(['is_owner' => true]))
            ->post('/categories', [
                'name' => 'Test Category',
                'description' => 'Test Description',
                'sub_categories' => json_encode($subCategories),
            ]);

        $response->assertStatus(Response::HTTP_FOUND);
    }

    public function testSubCategoriesCanBeUpdated()
    {
        $user = $this->actingAsUser(['is_owner' => true]);
        auth()->login($user);
        $categoryCreateDTO = CategoryCreateDTO::create(
            name: 'Test Category',
            description: 'Test Description',
            subCategories: [],
        );
        $category = CategoryCreate::create($categoryCreateDTO);
        $subCategoryCreateDTO = SubCategoryCreateDTO::create(
            name: 'Sub Category',
            description: 'Sub Description',
        );
        $subCategory = SubCategoryCreate::create($subCategoryCreateDTO, $category);

        $updatedSubCategories = ['id' => $subCategory->id, 'name' => 'Sub Category Updated', 'description' => 'Sub Description'];

        $response = $this
            ->from("/categories/{$category->id}/edit")
            ->put("/categories/{$category->id}", [
                'name' => 'Test Category',
                'description' => 'Test Description',
                'category_id' => $category->id,
                'sub_categories' => json_encode([$updatedSubCategories]),
            ]);

        $response->assertStatus(Response::HTTP_OK);
    }

    public function testSubCategoriesCanBeDeleted()
    {
        $user = $this->actingAsUser(['is_owner' => true]);
        auth()->login($user);
        $categoryCreateDTO = CategoryCreateDTO::create(
            name: 'Test Category',
            description: 'Test Description',
            subCategories: [],
        );
        $category = CategoryCreate::create($categoryCreateDTO);
        $subCategoryCreateDTO = SubCategoryCreateDTO::create(
            name: 'Delete me Sub Category',
            description: 'Sub Description',
        );
        $subCategory = SubCategoryCreate::create($subCategoryCreateDTO, $category);

        $updatedSubCategories = ['id' => $subCategory->id, 'name' => 'Sub Category Updated', 'description' => 'Sub Description', 'delete' => 'true'];

        $response = $this
            ->from("/categories/{$category->id}/edit")
            ->put("/categories/{$category->id}", [
                'name' => 'Test Category',
                'description' => 'Test Description',
                'category_id' => $category->id,
                'sub_categories' => json_encode([$updatedSubCategories]),
            ]);

        $response->assertStatus(Response::HTTP_OK);
        $this->assertDatabaseMissing('sub_categories', $subCategory->toArray());
    }
}

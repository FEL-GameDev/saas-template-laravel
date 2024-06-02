<?php

namespace Services\Category;

use App\DTO\Category\CategoryCreateDTO;
use App\Services\Category\CategoryCreate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Tests\Traits\HasAuthenticatedUser;

class CategoryCreateTest extends TestCase
{
    use RefreshDatabase, hasAuthenticatedUser;

    public function testCreatesCategory(): void
    {
        Auth::login($this->actingAsUser());

        $categoryCreateDTO = CategoryCreateDTO::create(name: "My name", description: "Some description");
        $category = CategoryCreate::create($categoryCreateDTO);

        $this->assertNotNull($category);
    }
}

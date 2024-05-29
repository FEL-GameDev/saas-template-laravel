<?php

namespace Services\Category;

use App\Models\Account;
use App\Models\Category;
use App\Services\Category\CategoryDelete;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Tests\Traits\HasAuthenticatedUser;

class CategoryDeleteTest extends TestCase
{
    use RefreshDatabase, hasAuthenticatedUser;

    public function testDeleteCategory(): void
    {
        $account = $this->actingAsAccount();
        $user = $this->actingAsUser();
        Auth::login($user);
        $category = Category::factory()->create(["account_id" => $account->id]);

        $is_deleted = CategoryDelete::delete($category);

        $this->assertTrue($is_deleted);
    }
}

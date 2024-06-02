<?php

namespace App\Services\Category;

use App\Models\Category;

class CategoryDelete
{
    public static function delete(Category $category): bool
    {
        return $category->delete();
    }
}

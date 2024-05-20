<?php

namespace App\DTO\Category;

class CategoryCreateDTO
{

    private function __construct(
        public int    $accountId,
        public string $name,
        public ?string $description,
    )
    {
    }


    public static function create(int $accountId, string $name, ?string $description): CategoryCreateDTO
    {
        return new self(
            accountId: $accountId,
            name: $name,
            description: $description,
        );
    }
}

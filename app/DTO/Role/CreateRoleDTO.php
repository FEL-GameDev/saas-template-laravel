<?php

namespace App\DTO\Role;

class CreateRoleDTO
{
    private function __construct(
        public string $name,
        public string $description,
        public int    $accountId,
        public string $roleCode,
    )
    {
    }

    public static function create(int $accountId, string $roleCode, string $name, string $description): CreateRoleDTO
    {
        return new self(
            name: $name,
            description: $description,
            accountId: $accountId,
            roleCode: $roleCode
        );
    }
}

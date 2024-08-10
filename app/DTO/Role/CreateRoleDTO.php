<?php

namespace App\DTO\Role;

readonly class CreateRoleDTO
{
    private function __construct(
        public string $name,
        public string $description,
        public string $roleCode,
    )
    {
    }

    public static function create(string $roleCode, string $name, string $description): CreateRoleDTO
    {
        return new self(
            name: $name,
            description: $description,
            roleCode: $roleCode
        );
    }
}

<?php

namespace App\DTO;

readonly class CreateUserInviteDTO
{

    private function __construct(
        public string $name,
        public string $email,
        public int    $userId,
    )
    {
    }

    public static function create(
        string $name,
        string $email,
        int    $userId,
    ): CreateUserInviteDTO
    {
        return new self(
            name: $name,
            email: $email,
            userId: $userId,
        );
    }
}

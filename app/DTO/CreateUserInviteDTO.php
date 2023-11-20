<?php

namespace App\DTO;

class CreateUserInviteDTO
{

    private function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly int    $userId,
        public readonly int    $accountId,
    )
    {
    }

    public static function create(
        string $name,
        string $email,
        int    $userId,
        int    $accountId,
    ): CreateUserInviteDTO
    {
        return new self(
            name: $name,
            email: $email,
            userId: $userId,
            accountId: $accountId
        );
    }
}

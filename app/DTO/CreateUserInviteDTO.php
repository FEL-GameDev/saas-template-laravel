<?php

namespace App\DTO;

readonly class CreateUserInviteDTO
{

    private function __construct(
        public string $name,
        public string $email,
        public int    $userId,
        public int    $accountId,
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

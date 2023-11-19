<?php

namespace App\DTO;

class CreateUserDTO
{
    private function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly string $accountId,
        public readonly bool $is_owner,
    ) {
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $accountId
     * @return CreateUserDTO
     */
    public static function create(string $name, string $email, string $password, string $accountId, bool $is_owner = false): CreateUserDTO
    {
        return new self($name, $email, $password, $accountId, $is_owner);
    }
}

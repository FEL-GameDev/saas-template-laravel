<?php

namespace App\DTO;

readonly class CreateUserDTO
{
    private function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $accountId,
        public bool   $is_owner,
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

<?php

namespace App\DTO;

readonly class CreateUserDTO
{
    private function __construct(
        public string $name,
        public string $email,
        public string $password,
        public bool   $is_owner,
    )
    {
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @param bool $is_owner
     * @return CreateUserDTO
     */
    public static function create(string $name, string $email, string $password, bool $is_owner = false): CreateUserDTO
    {
        return new self($name, $email, $password, $is_owner);
    }
}

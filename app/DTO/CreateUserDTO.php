<?php

namespace App\DTO;

readonly class CreateUserDTO
{
    private function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $accountId,
        public bool   $isOwner,
        public int    $roleId,
    )
    {
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $accountId
     * @param bool $isOwner
     * @param int $roleId
     * @return CreateUserDTO
     */
    public static function create(string $name, string $email, string $password, string $accountId, bool $isOwner, int $roleId): CreateUserDTO
    {
        return new self($name, $email, $password, $accountId, $isOwner, $roleId);
    }
}

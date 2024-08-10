<?php

namespace App\DTO\User;

class NoAccountUserDTO
{
    private function __construct(
        public string $name,
        public string $email,
        public string $password,
        public int    $accountId,
    )
    {
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @param int $accountId
     * @return NoAccountUserDTO
     */
    public static function create(string $name, string $email, string $password, int $accountId): NoAccountUserDTO
    {
        return new self($name, $email, $password, $accountId);
    }
}

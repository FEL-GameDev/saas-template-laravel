<?php

namespace App\DTO;

class NewAccountDTO
{
    private function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly string $accountName,
    ) {
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return NewAccountDTO
     */
    public static function create(string $name, string $email, string $password, string $accountName): NewAccountDTO
    {
        return new self($name, $email, $password, $accountName);
    }
}

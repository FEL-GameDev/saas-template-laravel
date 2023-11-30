<?php

namespace App\DTO;

readonly class NewAccountDTO
{
    private function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $accountName,
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

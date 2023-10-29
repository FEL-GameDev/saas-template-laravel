<?php

namespace App\DTO;

class NewAccountDTO
{
    private function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly string $account_name,
    ) {
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return NewAccountDTO
     */
    public static function create(string $name, string $email, string $password): NewAccountDTO
    {
        return new self($name, $email, $password, "Account Name Lol");
    }
}

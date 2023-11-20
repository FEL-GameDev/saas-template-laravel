<?php

namespace App\DTO;

class RegisterUserInviteDTO
{
    private function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly string $inviteCode,
    ) {
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $inviteCode
     * @return RegisterUserInviteDTO
     */
    public static function create(string $name, string $email, string $password, string $inviteCode): RegisterUserInviteDTO
    {
        return new self($name, $email, $password, $inviteCode);
    }
}

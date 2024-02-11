<?php

namespace App\DTO;

readonly class RegisterUserInviteDTO
{
    private function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $inviteCode,
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

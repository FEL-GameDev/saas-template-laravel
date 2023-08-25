<?php

namespace App\Services;

use App\Models\User;

class CreateChirp
{

    static function create(array $chirpData, User $user)
    {
        // var_dump($user);
        $user->chirps()->create($chirpData);
    }
}
<?php

namespace App\Services\User;

use App\Models\User;

class UserProfileUpdate
{

    static function update(User $user, array $fields): User
    {
        $allowed_fields = ['name', 'email'];
        $fields = array_intersect_key($fields, array_flip($allowed_fields));

        $user->fill($fields);
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->update();

        return $user;
    }
}

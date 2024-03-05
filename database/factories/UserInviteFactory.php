<?php

namespace Database\Factories;

use App\Models\UserInvite;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<UserInvite>
 */
class UserInviteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'account_id' => 1,
            'user_id' => 1,
            'invite_code' => Str::random(10),
        ];
    }
}

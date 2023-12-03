<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition(): array
    {
        return [
            'name' => fake()->title(),
            'description' => fake()->realTextBetween(1, 255),
            'role_code' => fake()->realTextBetween(1, 64)
        ];
    }
}

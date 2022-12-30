<?php

namespace Database\Factories\User;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User\User>
 */
class UserFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->password, // password
            'remember_token' => Str::random(10),
            'verified' => fake()->randomElement([User::USUARIO_VERIFICADO, User::USUARIO_NO_VERIFICADO]),
            'verification_token' => User::USUARIO_VERIFICADO ? null : User::generarVerificationToken(),
            'admin' => fake()->randomElement([User::USUARIO_ADMINISTRADOR, User::USUARIO_REGULAR])
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

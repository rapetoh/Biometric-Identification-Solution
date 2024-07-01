<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agent>
 */
class AgentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'idAgent' => fake()->unique()->imei(),
            'nom' => fake()->lastName(),
            'prenom' => fake()->firstName(),
            'mail' => fake()->unique()->safeEmail(),
            'telephone' => fake()->phoneNumber(),
            'domicile' => fake()->streetAddress(),
            'created_at' => now(),
            'mdp' => bcrypt('password'), // password
        ];
    }

    // /**
    //  * Indicate that the model's email address should be unverified.
    //  *
    //  * @return static
    //  */
    // public function unverified()
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Professor>
 */
class ProfessorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $email = fake()->unique()->safeEmail();
        return [
            'nome' => fake()->name(),
            'matricula' => fake()->unique()->numberBetween(100000000, 999999999),
            'email' => $email,
            'user_id' => \App\Models\User::factory(
                [
                    'email' => $email
                ]
            )->create()->id
        ];
    }
}

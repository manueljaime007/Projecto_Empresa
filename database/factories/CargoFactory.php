<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cargo>
 */
class CargoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cargos = [
            'Backend Developer', 'Cloud Architect', 'Cybersecurity Specialist', 'Data Scientist', 'Database Administrator', 'DevOps Engineer', 'Frontend Developer', 'Full Stack Developer', 'IT Project Manager', 'Machine Learning Engineer', 'Mobile Developer', 'Network Engineer', 'Software Tester', 'Systems Analyst', 'UI/UX Designer'
        ];

        return [
            'cargo' => $this->faker->unique()->randomElement($cargos),
        ];
    }
}

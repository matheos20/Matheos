<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
                "email" => $this->faker->safeEmail,
                "contact" => $this->faker->phoneNumber,
                "whatsapp" => $this->faker->phoneNumber,
                "statut" => $this->faker->randomElement([
                    "VIP",
                    "Privilégié",
                    "Standard"
                ])
        ];
    }
}

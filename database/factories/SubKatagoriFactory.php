<?php

namespace Database\Factories;

use App\Models\Katagori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubKatagori>
 */
class SubKatagoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $katagoriId = Katagori::pluck('id')->toArray();
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'category_id' => $this->faker->randomElement($katagoriId),
        ];
    }
}

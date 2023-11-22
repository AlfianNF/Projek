<?php

namespace Database\Factories;

use App\Models\Games;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class GamesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $game_name = $this->faker->word;
        $game_slug = \Illuminate\Support\Str::slug($game_name);

        return [
            'game_name' => $game_name,
            'game_slug' => $game_slug,
        ];
    }
}

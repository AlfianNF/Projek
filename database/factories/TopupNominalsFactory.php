<?php

// database/factories/TopupNominalsFactory.php

namespace Database\Factories;

use App\Models\TopupNominals;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class TopupNominalsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nominal' => $this->faker->numberBetween( 10000,1500000),
            'nama_nominal' => $this->faker->text(10),
            'game_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}

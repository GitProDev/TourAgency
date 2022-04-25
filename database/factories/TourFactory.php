<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Attraction;

class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $number_of_attractions = Attraction::get()->count();
        if($number_of_attractions == 0)
            Attraction::factory(1)->create();

        return [
            'cost' => $this->faker->numberBetween(10, 1000),
            'date' => $this->faker->dateTimeBetween('0 week', '+4 week'),
            'description' => $this->faker->paragraph(),
            'attraction_id' => $this->faker->numberBetween(1, $number_of_attractions) //Attraction::factory()
        ];
    }
}


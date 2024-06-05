<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\models\Film;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    protected $model = Film::class;
    public function definition(): array
    {
        return [
            'titolo' => $this->faker->sentence(rand(1,10)),
            'trama'  => $this->faker->paragraph(),
            'anno_uscita' => $this->faker->year(),
            'durata' => $this->faker->numberBetween(50, 250),
            'link_trailer' => $this->faker->url()
        ];
    }
}

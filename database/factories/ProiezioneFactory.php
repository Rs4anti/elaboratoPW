<?php

namespace Database\Factories;

use App\Models\Proiezione;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proiezione>
 */
class ProiezioneFactory extends Factory
{
    protected $model = Proiezione::class;
    public function definition(): array
    {
        return [
            'data' => $this->faker->dateTimeBetween('-1 year', '+1 year'), // Date between 1 year ago and 1 year in the future
            'ora' =>  $this->faker->time()
        ];
    }

    public function past(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'data' => $this->faker->dateTimeBetween('-1 year', 'now'),
            ];
        });
    }

    public function future(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'data' => $this->faker->dateTimeBetween('now', '+1 year'),
            ];
        });
    }
}

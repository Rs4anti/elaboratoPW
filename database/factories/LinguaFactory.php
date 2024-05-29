<?php

namespace Database\Factories;

use App\Models\Lingua;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lingua>
 */
class LinguaFactory extends Factory
{
    protected $model = Lingua::class;

    public function definition(): array
    {
        return [
            'lingua' => $this->faker->languageCode
        ];
    }
}

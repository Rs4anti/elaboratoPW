<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cinema;

class CinemaFactory extends Factory
{
    protected $table = 'cinema';
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word
        ];
    }
}

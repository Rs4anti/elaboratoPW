<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\models\Genere;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genere>
 */
class GenereFactory extends Factory
{
   
    protected $model = Genere::class;
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word
        ];
    }
}

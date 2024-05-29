<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\models\Sala;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sala>
 */
class SalaFactory extends Factory
{
    protected $model = Sala::class;
    public function definition(): array
    {
        return [
            'nome'=> $this->faker->name,
            'n_posti' => $this->faker->numberBetween(50, 500)
        ];
    }
}

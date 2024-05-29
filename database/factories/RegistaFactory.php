<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\models\Regista;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Regista>
 */
class RegistaFactory extends Factory
{
    protected $model = Regista::class;
    public function definition(): array
    {
        return [
            'nome' => $this->faker->firstName(),
            'cognome' => $this->faker->lastName
        ];
    }
}

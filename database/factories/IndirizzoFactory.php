<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\models\Indirizzo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Indirizzo>
 */
class IndirizzoFactory extends Factory
{
    protected $table = 'indirizzo';
    // ['nazione', 'regione', 'provincia', 'citta', 'via', 'civico', 'CAP'];
    public function definition(): array
    {
        return [
            'nazione'=> 'Italia', 
            'regione'=> 'Lombardia', 
            'provincia'=> $this->faker->state, 
            'citta'=> $this->faker->city, 
            'via'=> 'VIA DEL CINEMA', 
            'civico'=>  $this->faker->numberBetween(1,120),
            'CAP' => $this->faker->numberBetween(1000, 5000)
        ];
    }
}

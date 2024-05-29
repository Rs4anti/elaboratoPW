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
            'data' => $this->faker->date('d_m_Y'),
            'ora' =>  $this->faker->time
        ];
    }
}

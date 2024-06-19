<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\models\Film;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    protected $model = Film::class;

    private $width = 480;
    private $height = 640;
    private $category = 'animals'; // Categoria predefinita
    private $randomize = true;
    private $word = null;
    private $gray = false;
    private $format = 'png';

    // Metodo per ottenere l'URL dell'immagine
    private function imageUrl(): string
    {
        return $this->faker->imageUrl(
            $this->width,
            $this->height,
            $this->category,
            $this->randomize,
            $this->word,
            $this->gray,
            $this->format
        );
    }

    // Metodo per salvare l'immagine in un percorso specificato
    private function saveImage(string $path): string
    {
        $imageUrl = $this->imageUrl();
        $imageContents = file_get_contents($imageUrl);
        $fileName = uniqid() . '.' . $this->format;
        $filePath = $path . '/' . $fileName;

        Storage::disk('public')->put($filePath, $imageContents);

        return $filePath;
    }

    public function definition(): array
    {   $path = 'locandine'; // Specifica il percorso di salvataggio
        return [
            'titolo' => $this->faker->sentence(rand(1,10)),
            'trama'  => $this->faker->paragraph(),
            'anno_uscita' => $this->faker->year(),
            'durata' => $this->faker->numberBetween(50, 250),
            'link_trailer' => $this->faker->url(),
            'path_locandina' => $this->saveImage($path)
        ];
    }
}

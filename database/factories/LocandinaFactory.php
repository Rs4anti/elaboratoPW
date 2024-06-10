<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Locandina;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Locandina>
 */
class LocandinaFactory extends Factory
{
    protected $model = Locandina::class;

    // Proprietà con valori predefiniti
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
    {
        $path = 'locandine'; // Specifica il percorso di salvataggio
        return [
            'path_locandina' => $this->saveImage($path),
        ];
    }
}

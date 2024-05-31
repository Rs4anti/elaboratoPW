<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\RegistaFactory;
use Database\Factories\CinemFactory;
use Illuminate\Database\Seeder;
use App\Models\Regista;
use App\Models\Film;
use App\Models\Lingua;
use App\Models\Sala;
use App\Models\Proiezione;
use App\Models\Cinema;
use App\Models\Indirizzo;
use App\Models\Genere;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->populateDB();
        //$this->createUsers();
        
    }

    private function populateDB(){
        
        //Creo 100 registi
        $registi = Regista::factory()->count(100)->create();

        // Crea film e associa casualmente da 1 a 3 registi per ogni film
        Film::factory()->count(75)->create()->each(function ($film) use ($registi) {
            // Prendo un subset casuale di registi (da 1 a 3)
            $randomRegisti = $registi->random(rand(1, 3));
            $film->registi()->attach($randomRegisti);
        });

        $films = Film::all();
        $lingue = Lingua::factory()->count(15)->create();

        foreach($films as $film){
            $numeroLingue = rand(1,5);
            for($i=0; $i<$numeroLingue; $i++){
            $film->sottotitoli()->attach($lingue->random(1,3));
            $film->lingueAudio()->attach($lingue->random(1,5));
            }
        }

        $cinemas = Cinema::factory()->count(2)->create()->each(function ($cinema){
            Indirizzo::factory()->count(1)->create(['cinema_id' => $cinema->id]);
            Sala::factory()->count(4)->create(['cinema_id' => $cinema->id]);
        });
        
         // Recupero tutte le sale
         $sale = Sala::all();
 
         // Itera sui film
         foreach ($films as $film) {
             // Ottieni una sala casuale per la proiezione
             $sala = $sale->random();
 
             // Crea una nuova proiezione per il film nella sala selezionata
             Proiezione::factory()->create([
                 'film_id' => $film->id,
                 'sala_id' => $sala->id,
             ]);
         }


         Genere::factory()->count(1)->create(['nome' => 'Azione']);
         Genere::factory()->count(1)->create(['nome' => 'Avventura']);
         Genere::factory()->count(1)->create(['nome' => 'Commedia']);
         Genere::factory()->count(1)->create(['nome' => 'Crime']);
         Genere::factory()->count(1)->create(['nome' => 'Documentario']);
         Genere::factory()->count(1)->create(['nome' => 'Drammatico']);
         Genere::factory()->count(1)->create(['nome' => 'Fantascienza']);
         Genere::factory()->count(1)->create(['nome' => 'Fantasy']);
         Genere::factory()->count(1)->create(['nome' => 'Horror']);
         Genere::factory()->count(1)->create(['nome' => 'Mistero']);
         Genere::factory()->count(1)->create(['nome' => 'Musical']);
         Genere::factory()->count(1)->create(['nome' => 'Romantico']);
         Genere::factory()->count(1)->create(['nome' => 'Storico']);
         Genere::factory()->count(1)->create(['nome' => 'Thriller']);
         Genere::factory()->count(1)->create(['nome' => 'Western']);

         $generi = Genere::all();

         foreach($films as $film){
            $numeroGeneri = rand(1,5);
            $generiScelti = $generi->random($numeroGeneri);
            $film->genere()->attach($generiScelti);
         }
         














}
    

    //private function createUsers() {

        // User::factory(10)->create();
      //  User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);
    //}
}

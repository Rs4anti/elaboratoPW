<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\LocandinaFactory;
use Illuminate\Database\Seeder;
use App\Models\Regista;
use App\Models\Film;
use App\Models\Lingua;
use App\Models\Genere;
use App\Models\Cinema;
use App\Models\Indirizzo;
use App\Models\Sala;
use App\Models\Proiezione;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        $this->createUsers();
        $this->populateDB();
    }

    private function populateDB(){
        
       
        //Creo 100 registi
        $registi = Regista::factory()->count(15)->create();

        // Crea film e associa casualmente da 1 a 3 registi per ogni film
        Film::factory()->count(15)->create()->each(function ($film) use ($registi) {
            // Prendo un subset casuale di registi (da 1 a 3)
            $randomRegisti = $registi->random(rand(1, 3));
            $film->registi()->attach($randomRegisti);           
           });

           $films = Film::all();
           $utentiRegistrati = User::all();

        foreach($films as $film){
            $film->user_id = $utentiRegistrati->random()->id;
            $film->save();
        }
           

        //In caso non serva visualizzare info lingua (es.sub assenti)
        Lingua::factory()->count(1)->create(['lingua' => 'nessuna']); 
        Lingua::factory()->count(1)->create(['lingua' => 'Inglese']);
        Lingua::factory()->count(1)->create(['lingua' => 'Italiano']);
        Lingua::factory()->count(1)->create(['lingua' => 'Francese']);
        Lingua::factory()->count(1)->create(['lingua' => 'Spagnolo']);
        Lingua::factory()->count(1)->create(['lingua' => 'Tedesco']);
        Lingua::factory()->count(1)->create(['lingua' => 'Portoghese']);
        Lingua::factory()->count(1)->create(['lingua' => 'Russo']);
        Lingua::factory()->count(1)->create(['lingua' => 'Cinese']);
        Lingua::factory()->count(1)->create(['lingua' => 'Giapponese']);
        Lingua::factory()->count(1)->create(['lingua' => 'Coreano']);
        Lingua::factory()->count(1)->create(['lingua' => 'Arabo']);
        Lingua::factory()->count(1)->create(['lingua' => 'Hindi']);
        Lingua::factory()->count(1)->create(['lingua' => 'Persiano']);
        Lingua::factory()->count(1)->create(['lingua' => 'Turco']);
        Lingua::factory()->count(1)->create(['lingua' => 'Olandese']);
        Lingua::factory()->count(1)->create(['lingua' => 'Svedese']);
        Lingua::factory()->count(1)->create(['lingua' => 'Norvegese']);
        Lingua::factory()->count(1)->create(['lingua' => 'Danese']);
        Lingua::factory()->count(1)->create(['lingua' => 'Finlandese']);
        Lingua::factory()->count(1)->create(['lingua' => 'Greco']);
        Lingua::factory()->count(1)->create(['lingua' => 'Polacco']);
        Lingua::factory()->count(1)->create(['lingua' => 'Ceco']);
        Lingua::factory()->count(1)->create(['lingua' => 'Ungherese']);
        Lingua::factory()->count(1)->create(['lingua' => 'Rumeno']);
        Lingua::factory()->count(1)->create(['lingua' => 'Bulgaro']);
        Lingua::factory()->count(1)->create(['lingua' => 'Croato']);
        Lingua::factory()->count(1)->create(['lingua' => 'Serbo']);

        $lingue = Lingua::all();



        foreach($films as $film){
            $numeroLingue = rand(1,5);
            for($i=0; $i<$numeroLingue; $i++){
            $film->sottotitoli()->attach($lingue->random(1,3));
            $film->lingueAudio()->attach($lingue->random(1,5));
            }
        }

        $cinemas = Cinema::factory()->count(2)->create()->each(function ($cinema){
           Indirizzo::factory()->count(1)->create(['cinema_id' => $cinema->id]);
           Sala::factory()->count(2)->create(['cinema_id' => $cinema->id]);
        });
        
         // Recupero tutte le sale
        $sale = Sala::all();

        // Itera sui film
        foreach ($films as $film) {
            // Definisco numero tra 1 e 4 di proiezioni per ogni $film
            $numeroProiezioniPerFilm = rand(1,4); 
            for ($i = 0; $i < $numeroProiezioniPerFilm; $i++) {
                // Ottengo una sala casuale per la proiezione
                $sala = $sale->random();

                // Creo una nuova proiezione per il film nella sala selezionata
                Proiezione::factory()->create([
                    'film_id' => $film->id,
                    'sala_id' => $sala->id,
                    'user_id' => $utentiRegistrati->random()->id
                ]);
            }
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
            $film->generi()->attach($generiScelti);
            
         }

}
    

    private function createUsers() {

        User::factory()->create([
            'name' => 'Roberto Santicoli',
            'email' => 'santicoliroberto@gmail.com',
            'password' => 'santicoli',
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Paolo Santicoli',
            'email' => 'santicolipaolo@gmail.com',
            'password' => 'santicoli',
            'role' => 'registered_user'
        ]);

        User::factory()->create([
            'name' => 'Giacomino Santicoli',
            'email' => 'santicoligiacomino@gmail.com',
            'password' => 'santicoli',
            'role' => 'registered_user'
        ]);


    }
}

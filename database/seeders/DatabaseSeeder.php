<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\RegistaFactory;
use Illuminate\Database\Seeder;
use App\Models\Regista;
use App\Models\Film;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->populateDB();
        $this->createUsers();
        
    }

    private function populateDB(){
        
        //Creo 100 registi
        Regista::factory()->count(100)->create();


       

        // Randomly associate a film to a subset of registi (from 1 to 3)
       // $films = Film::all();
       // $registi = Regista::all();

       // foreach($films as $film)
       // {
       //     $numeroRegisti = rand(1,3);
       //     $registiSelezionati = $registi->random($numeroRegisti);
       //     $film->categories()->attach($registiSelezionati);
       // }

    }

    private function createUsers() {

        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}

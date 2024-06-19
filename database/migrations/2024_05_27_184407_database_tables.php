<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('films', function (Blueprint $table) {
            $table -> id();
            $table -> string('titolo');
            $table -> text('trama');
            $table -> integer('anno_uscita');
            $table -> integer('durata');
            $table -> text('link_trailer');
            $table -> timestamps();
       });

       Schema::create('regista', function (Blueprint $table) {
            $table -> id();
            $table -> string('nome');
            $table -> string('cognome');
            $table -> timestamps();
        });

        Schema::create('regista_film', function (Blueprint $table) {
            $table -> id();
            $table -> unsignedBigInteger('film_id');
            $table -> unsignedBigInteger('regista_id');
            $table -> timestamps();
            });

        Schema::create('generi', function (Blueprint $table) {
            $table -> id();
            $table -> string('nome');
            $table -> timestamps();
        });

        Schema::create('genere_film', function (Blueprint $table){
            $table -> id();
            $table -> unsignedBigInteger('film_id');
            $table -> unsignedBigInteger('genere_id');
            $table -> timestamps();
        });

        Schema::create('lingue', function (Blueprint $table){
            $table -> id();
            $table -> string('lingua');
            $table -> timestamps();
        });

        Schema::create('lingua_audio', function (Blueprint $table) {
            $table -> id();
            $table -> unsignedBigInteger('film_id');
            $table -> unsignedBigInteger('lingua_id');
            $table -> timestamps();
        });

        Schema::create('lingua_sottotitoli', function (Blueprint $table){
            $table -> id();
            $table -> unsignedBigInteger('film_id');
            $table -> unsignedBigInteger('lingua_id');
            $table -> timestamps();
        });

        Schema::create('indirizzo', function (Blueprint $table) {
           $table -> id();
           $table -> unsignedBigInteger('cinema_id');
           $table -> string('nazione');
           $table -> string('regione');
           $table -> string('provincia');
           $table -> string('citta');
           $table -> string('via');
           $table -> integer('civico');
           $table -> string('CAP');
           $table -> timestamps();
        });

        Schema::create('cinema', function (Blueprint $table){
           $table -> id();
           $table -> string('nome');
           $table -> timestamps();
        });

        Schema::create('sale', function(Blueprint $table){
           $table -> id();
           $table -> unsignedBigInteger('cinema_id');
           $table -> string('nome');
           $table -> unsignedInteger('n_posti');
           $table -> timestamps();
        });

         
        Schema::create('proiezioni', function(Blueprint $table){
           $table -> id();
           $table -> unsignedBigInteger('film_id');
           $table -> unsignedBigInteger('sala_id');
           $table -> date('data');
           $table -> time('ora', 0);
           $table -> timestamps();
        });
        

        Schema::create('locandina_film', function(Blueprint $table){
           $table -> id();
           $table -> unsignedBigInteger('film_id');
           $table -> text('path_locandina');
           $table -> timestamps();
       });

        // VINCOLI DI INTEGRITA REFERENZIALE


        //Per 'genere' n:m
        Schema::table('genere_film', function(Blueprint $table){
            $table->foreign('film_id')->references('id')->on('films');
        });

        Schema::table('genere_film', function(Blueprint $table){
            $table->foreign('genere_id')->references('id')->on('generi');
        });

        //Per 'lingua_audio' 
        Schema::table('lingua_audio', function(Blueprint $table){
            $table->foreign('film_id')->references('id')->on('films');
        });

        Schema::table('lingua_audio', function(Blueprint $table){
            $table->foreign('lingua_id')->references('id')->on('lingue');
        });

        //Per 'lingua_sottotitoli'
        Schema::table('lingua_sottotitoli', function(Blueprint $table){
            $table->foreign('film_id')->references('id')->on('films');
        });

        Schema::table('lingua_sottotitoli', function(Blueprint $table){
            $table->foreign('lingua_id')->references('id')->on('lingue');
        });

        //Per 'regista_film'
        Schema::table('regista_film', function(Blueprint $table){
            $table->foreign('film_id')->references('id')->on('films');
        });

        Schema::table('regista_film', function(Blueprint $table){
            $table->foreign('regista_id')->references('id')->on('regista');
        });

        
        //Per 'proiezione'
        Schema::table('proiezioni', function(Blueprint $table){
           $table->foreign('film_id')->references('id')->on('films');
        });

         
        Schema::table('proiezioni', function(Blueprint $table){
           $table->foreign('sala_id')->references('id')->on('sale');
        });
        


        //Per 'sala'
        Schema::table('sale', function(Blueprint $table) {
           $table->foreign('cinema_id')->references('id')->on('cinema');
        });

        Schema::table('locandina_film', function(Blueprint $table){
           $table->foreign('film_id')->references('id')->on('films');
        });

        Schema::table('indirizzo', function(Blueprint $table){
           $table->foreign('cinema_id')->references('id')->on('cinema');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proiezioni');
        Schema::dropIfExists('sala_cinema');
        Schema::dropIfExists('sale');
        Schema::dropIfExists('cinema');
        Schema::dropIfExists('indirizzo');
        Schema::dropIfExists('lingua_sottotitoli');
        Schema::dropIfExists('lingua_audio');
        Schema::dropIfExists('lingue');
        Schema::dropIfExists('genere_film');
        Schema::dropIfExists('generi');
        Schema::dropIfExists('regista_film');
        Schema::dropIfExists('registi');
        Schema::dropIfExists('films');
        Schema::dropIfExists('locandina_film');
    }
};

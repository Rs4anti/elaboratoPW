<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';

    protected $fillable = ['titolo', 'trama', 'anno_uscita', 'durata'];


    public function proiezioni(){
        return $this->hasMany(Proiezione::class, 'film_id');
    }
    public function registi(){
        return $this->belongsToMany(Regista::class, 'regista_film', 'film_id', 'regista_id');
    }

    public function genere(){
        return $this->belongsToMany(Genere::class, 'genere_film', 'film_id', 'genere_id' );
    }

    public function lingue(){
        return $this->belongsToMany(Lingua::class, 'lingua_audio', 'film_id', 'lingua_id');
    }

    public function sottotioli(){
        return $this->belongsToMany(Lingua::class, 'lingua_sottotioli', 'film_id', 'lingua_id');
    }

    public function locandinaFilm(){
        return $this->hasOne(Locandina::class, 'film_id', 'id');
    }
}

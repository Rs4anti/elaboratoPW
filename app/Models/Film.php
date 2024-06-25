<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'films';

    protected $fillable = ['titolo', 'trama', 'anno_uscita', 'durata', 'link_trailer', 'path_locandina' , 'user_id'];


    public function proiezioni(){
        return $this->hasMany(Proiezione::class, 'film_id', 'id');
    }
    public function registi(){
        return $this->belongsToMany(Regista::class, 'regista_film', 'film_id', 'regista_id');
    }

    public function generi(){
        return $this->belongsToMany(Genere::class, 'genere_film', 'film_id', 'genere_id' );
    }

    public function lingueAudio(){
        return $this->belongsToMany(Lingua::class, 'lingua_audio', 'film_id', 'lingua_id');
    }

    public function sottotitoli(){
        return $this->belongsToMany(Lingua::class, 'lingua_sottotitoli', 'film_id', 'lingua_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

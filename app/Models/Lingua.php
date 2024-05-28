<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lingua extends Model
{
    use HasFactory;

    protected $table = 'lingue';

    protected $fillable = ['lingua'];

    public function languageFilms(){
        return $this->belongsToMany(Film::class, 'lingua_audio', 'film_id', 'lingua_id');
    }

    public function subFilms(){
        return $this->belongsToMany(Film::class, 'lingua_sottotioli', 'film_id', 'lingua_id');
    }
}

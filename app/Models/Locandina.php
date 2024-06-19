<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locandina extends Model
{
    use HasFactory;

    protected $table = 'locandina_film';

    protected $fillable = ['file_locandina'];

    // public function locandinaFilm(){
    //     return $this->belongsTo(Film::class, 'film_id', 'id');
    // }
}

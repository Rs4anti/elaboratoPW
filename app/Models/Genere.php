<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genere extends Model
{
    use HasFactory;

    protected $table = 'generi';

    protected $fillable = ['nome'];

    public function films(){
        return $this->belongsToMany(Film::class, 'genere_film', 'genere_id', 'film_id' );
    }
}

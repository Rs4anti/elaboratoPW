<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regista extends Model
{
    use HasFactory;

    protected $table = 'regista';

    protected $fillable = ['nome', 'cognome'];

    public function films(){
        return $this->belongsToMany(Film::class, 'regista_film', 'film_id', 'regista_id');
    }
}

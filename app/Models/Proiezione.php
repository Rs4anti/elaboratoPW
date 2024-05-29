<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proiezione extends Model
{
    use HasFactory;

    protected $table = 'proiezioni';

    protected $fillable=['data', 'ora'];

    // in una sala proietto un fiilm
    public function film(){
        return $this->belongsTo(Film::class, 'film_id');
    }

    // Una proiezione appartiene a una sala
    public function sala(){
        return $this->belongsTo(Sala::class, 'sala_id');
    }

}

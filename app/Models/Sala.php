<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;
    
    protected $table = 'sale';

    protected $fillabe = ['nome', 'n_posti'];

    // Relazione uno a molti con Proiezioni
    public function proiezioni(){
        return $this->hasMany(Proiezione::class, 'sala_id', 'id');
    }

    // Relazione molti a uno con Cinema
    public function cinema(){
        return $this->belongsTo(Cinema::class, 'cinema_id', 'id');
    }
}

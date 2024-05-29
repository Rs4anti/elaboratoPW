<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indirizzo extends Model
{
    use HasFactory;

    protected $table = 'indirizzo';

    protected $fillable = ['nazione', 'regione', 'provincia', 'citta', 'via', 'civico', 'CAP'];

     // Relazione uno a uno con Cinema
    public function cinema(){
        return $this->belongsTo(Cinema::class, 'indirizzo_id', 'id');
    }
}

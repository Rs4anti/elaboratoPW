<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;
    
    protected $table = 'sale';

    protected $fillabe = ['nome', 'n_posti'];

    public function proiezioni(){
        return $this->hasMany(Proiezione::class, 'sala_id');
    }

    public function cinema(){
        return $this->belongsTo(Cinema::class, 'cinema_id');
    }
}

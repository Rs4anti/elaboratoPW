<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $table = 'cinema';

    protected $fillable = ['nome'];


    //relazione uno a molti con le sale
    public function sale(){
        return $this->hasMany(Sala::class, 'cinema_id' , 'id');
    }

    //relazione uno a uno con indirizzo
    public function indirizzo(){
        return $this->hasOne(Indirizzo::class, 'indirizzo_id', 'id');
    }
}

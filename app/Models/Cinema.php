<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $table = 'cinema';

    protected $fillable = ['nome'];

    public function sale(){
        return $this->hasMany(Sala::class, 'cinema_id');
    }

    public function indirizzo(){
        return $this->belongsTo(Indirizzo::class, 'indirizzo_id');
    }
}

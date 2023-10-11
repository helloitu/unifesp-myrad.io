<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;
    protected $fillable = ['nome','autor','genero','path','duracao','img','votos'];

    public function artista(){
        return $this->belongsTo(Artista::class);
    }
}

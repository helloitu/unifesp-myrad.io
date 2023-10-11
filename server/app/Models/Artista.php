<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;
    protected $fillable = ['nome','img','descricao'];
    public function musicas(){
        return $this->hasMany(Musica::class);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\config;
use App\Models\Musica;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //Injeção de dependencias
    private $config;
    private $musica;
    public function __construct(config $config, Musica $musica){
        $this->config = $config;
        $this->musica = $musica;
    }

    /**
     * Retorna configuração atual
     */
    public function index()
    {
        return $this->config->first();
    }

    /**
     * Abre a votação no sistema
     */
    public function abre_votacao(){
        return $this->config->find('1')->update(['votacoes'=>true]);
    }

    /**
     * Fecha votação no sistema
     */
    public function fecha_votacao(){
        return $this->config->find('1')->update(['votacoes'=>false]);
    }

    /**
     * Abre os cadastros
     */
    public function abre_cadastros(){
        return $this->config->find('1')->update(['cadastros'=>true]);
    }

    /**
     * Fecha os cadastros
     */
    public function fecha_cadastros(){
        return $this->config->find('1')->update(['cadastros'=>false]);
    }

    /**
     * Gera playlist baseada nas X músicas mais votadas
     *  e inicia IceS (Icecast).
     */
    public function inicia_stream(){
        system("ices -c ices.conf");
        return true;
    }

    /**
     * Retorna Ranking atual de músicas.
     */
    public function gera_ranking(){
        return $this->musica->orderBy('votos', 'DESC')->take(10)->get();
    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Musica;
use App\Models\Artista;
use Illuminate\Http\Request;

class MusicaController extends Controller
{
    private $musica;
    public function __construct(Musica $musica){
        $this->musica = $musica;
    }
    /**
     * Display a listing of the resource.
     * @param Artista $artista
     */
    public function index(Artista $artista)
    {
        return $artista->musicas()->paginate(10);
    }

    /**
     * Display a listing of the resource.
     * @param string $genero
     * @return \Illuminate\Http\Response
     */
    public function lista_genero(string $genero){
        return $this->musica->where('genero', '=', $genero)->get();
    }
    /**
     * @return \Illuminate\Http\Response
     */
    public function generos(){
        $generos_totais = array();
        $result = $this->musica->distinct('genero')->get('genero');
        foreach($result as &$value){
            $generos_totais[$value['genero']] = $this->lista_genero($value['genero']);
        }
        return $generos_totais;
    }

    /**
     * Store a newly created resource in storage.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->musica->create($request->all());
    }

    /**
     * Display the specified resource.
     * @param Artista $artista
     * @param Musica $musica
     * @return \Illuminate\Http\Response
     */
    public function show(Artista $artista, Musica $musica)
    {
        return $musica;
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param  Musica $musica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Musica $musica)
    {
        $musica->update($request->all());
        return $musica;
    }

    /**
     * Remove the specified resource from storage.
     * @param Musica $musica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Musica $musica)
    {
        return $musica->delete();
    }
}

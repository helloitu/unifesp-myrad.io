<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Musica;
use Illuminate\Http\Request;

class MusicaController extends Controller
{
    private $musica;
    public function __construct(Musica $musica){
        $this->musica = $musica;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->musica->paginate(10);
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
     * @param Musica $musica
     * @return \Illuminate\Http\Response
     */
    public function show(Musica $musica)
    {
        return $musica->with('artista')->first();
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

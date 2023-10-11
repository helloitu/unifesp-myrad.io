<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artista;
use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    private $artista;
    public function __construct(Artista $artista){
        $this->artista = $artista;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->artista->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *  @param Artista $artista
     *  @return \Illuminate\Http\Response
     */
    public function show(Artista $artista)
    {
        return $artista->with('musicas')->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

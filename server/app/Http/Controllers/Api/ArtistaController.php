<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artista;
use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    private Artista $artista;
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->artista->create($request->all());
    }

    /**
     * Display the specified resource.
     *  @param Artista $artista
     *  @return \Illuminate\Http\Response
     */
    public function show(Artista $artista)
    {
        return $artista;
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param  Artista $artista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artista $artista)
    {
        $artista->update($request->all());
        return $artista;
    }

    /**
     * Remove the specified resource from storage.
     * @param Artista $artista
     */
    public function destroy(Artista $artista)
    {
        return $artista->delete();
    }
}

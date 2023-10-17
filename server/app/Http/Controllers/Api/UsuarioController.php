<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Musica;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    private Usuario $usuario;
    private Musica $musica;
    public function __construct(Usuario $usuario, Musica $musica) {
        $this->usuario = $usuario;
        $this->musica = $musica;
    }
    /**
     * Retorna usuários paginando de 10 em 10 registros
     */
    public function index()
    {
        return $this->usuario->paginate(10);
    }

    /**
     * Cria novo usuário
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->usuario->create($request->all());
    }

    /**
     * Retorna dados do usuário
     * @param Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return $usuario;
    }

    /**
     * Atualiza usuário
     * @param \Illuminate\Http\Request $request
     * @param  Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->update($request->all());
        return $usuario;
    }

    /**
     * Vota em música
     * @param Musica $musica
     * @param Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function vota(Usuario $usuario, Musica $musica){
        if ($usuario->decrement('votos',1) && $musica->increment('votos',1)){
            dd(true);
        }
        dd(false);
    }
    /**
     * Remove usuário
     * @param Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        return $usuario->delete();
    }


}

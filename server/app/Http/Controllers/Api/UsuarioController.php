<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    private Usuario $usuario;
    public function __construct(Usuario $usuario) {
        $this->usuario = $usuario;
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
        return $usuario->first();
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
     * Remove usuário
     * @param Usuario $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        return $usuario->delete();
    }
}

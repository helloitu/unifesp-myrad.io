<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Musica;
use Tymon\JWTAuth\JWTAuth;
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
     * @OA\Post(
     *     path="/api/usuario/login",
     *     summary="Authenticate user and generate JWT token",
     *     @OA\Parameter(
     *         name="numero",
     *         in="query",
     *         description="numero do usuario",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="senha",
     *         in="query",
     *         description="senha",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response="200", description="concedido"),
     *     @OA\Response(response="401", description="erro")
     * )
     */
    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $token = Auth::user()->createToken('api_token')->plainTextToken;
            return response()->json(['token' => $token], 200);
        }
        return response()->json(['error' => 'Invalid credentials'], 401);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Http\Resources\UsuarioResource;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('nombre')->get();
        return UsuarioResource::collection($usuarios);
    }
    public function show(Usuario $usuario)
    {
        return new UsuarioResource($usuario);
    }
    protected function validateRequest()
    {
        return request()->validate([
            'nombre' => 'required|min:5|max:255',
            'apellido' => 'required|min:5|max:255',
            'email' => 'required|min:5|max:255',
            'contraseña' => 'required|min:5|max:255',
            'fechaNacimiento' => 'required|min:5|max:255'
        ]);
    }
    public function store()
    {
        $data = $this->validateRequest();
        $usuario = Usuario::create($data);
        return new UsuarioResource($usuario);
    }
    public function update(Usuario $usuario)
    {
        $data = $this -> validateRequest();
        $usuario->update($data);
        return new UsuarioResource($usuario);
    }
    public function destroy(Usuario $usuario)
    {
        $usuario -> delete();
        return response()->noContent();
    }
}



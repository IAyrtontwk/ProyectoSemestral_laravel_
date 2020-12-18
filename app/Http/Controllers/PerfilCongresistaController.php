<?php

namespace App\Http\Controllers;
use App\Models\PerfilCongresista;
use App\Http\Resources\PerfilCongresistaResource;

class PerfilCongresistaController extends Controller
{
    public function index()
    {
        $perfiles = PerfilCongresista::orderBy('id_camara')->get();
        return PerfilCongresistaResource::collection($perfiles);
    }
    public function show(PerfilCongresista $perfil)
    {
        return new PerfilCongresistaResource($perfil);
    }
    protected function validateRequest()
    {
        return request()->validate([
            'camara' => 'required|integer|min:1',
            'nombre' => 'required|min:5|max:255',
            'apellidos' => 'required|min:5|max:255',
            'territorio' => 'required|integer|min:1',
            'numterritorio' => 'required|integer|min:1',
            'partido' => 'required|integer|min:1',
            'email' => 'required|min:5|max:255',
        ]);
    }
    public function store()
    {
        $data = $this->validateRequest();
        $perfil = PerfilCongresista::create($data);
        return new PerfilCongresistaResource($perfil);
    }
    public function update(PerfilCongresista $perfil)
    {
        $data = $this -> validateRequest();
        $perfil->update($data);
        return new PerfilCongresistaResource($perfil);
    }
    public function destroy(PerfilCongresista $perfil)
    {
        $perfil -> delete();
        return response()->noContent();
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Http\Resources\ProyectoResource;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::orderBy('id_camara')->get();
        return ProyectoResource::collection($proyectos);
    }
    public function show(Proyecto $proyecto)
    {
        return new ProyectoResource($proyecto);
    }
    protected function validateRequest()
    {
        return request()->validate([
            'titulo' => 'required|min:5|max:255',
            'estado' => 'required|integer|min:1',
            'fecha' => 'required|date|max:now()',
            'camara' => 'required|integer|min:1',
            'urlProyecto' => 'required|min:5|max:255',
            'urlVotacion' => 'required|min:5|max:255',
        ]);
    }
    public function store()
    {
        $data = $this->validateRequest();
        $proyecto = Proyecto::create($data);
        return new ProyectoResource($proyecto);
    }
    public function update(Proyecto $proyecto)
    {
        $data = $this -> validateRequest();
        $proyecto->update($data);
        return new ProyectoResource($proyecto);
    }
    public function destroy(Proyecto $proyecto)
    {
        $proyecto -> delete();
        return response()->noContent();
    }
}

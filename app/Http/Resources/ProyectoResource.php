<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProyectoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'estado' => $this->id_estado,
            'fecha' => $this->fecha,
            'camara' => $this->id_camara,
            'urlProyecto' => $this->urlProyecto,
            'urlVotacion' => $this->urlVotacion,
        ];
    }
}

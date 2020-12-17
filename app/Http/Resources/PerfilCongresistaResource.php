<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PerfilCongresistaResource extends JsonResource
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
            'camara' => $this->id_camara,
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'territorio' => $this->id_territorio,
            'numTerritorio' => $this->numTerritorio,
            'partido' => $this->id_partido,
            'email' => $this->email,
        ];
    }
}

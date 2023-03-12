<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProveedorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->pro_id,
            'nombre' => $this->pro_razon_social,
            'identificacion' => $this->pro_identificacion,
            'pais' => $this->pais->pai_nombre,
            'estado' => $this->pro_estado,
        ];
    }
}

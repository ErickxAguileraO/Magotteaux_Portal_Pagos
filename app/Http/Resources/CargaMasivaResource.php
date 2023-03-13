<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CargaMasivaResource extends JsonResource
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
            'id' => $this->log_id,
            'nombre' => $this->log_archivo,
            'usuario' => $this->log_usuario_id,
            'fecha_carga' => $this->created_at,
            'hora_carga' => $this->created_at,
        ];
    }
}

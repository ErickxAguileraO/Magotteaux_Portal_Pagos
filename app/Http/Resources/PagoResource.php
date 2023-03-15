<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PagoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $isProveedor = auth()->user()->hasRole('Proveedor');

        $data = [
            'id' => $this->pag_id,
            'referencia' => $this->pag_referencia,
            'importe_moneda' => $this->pag_importe_moneda,
            'fecha_documento' => $this->pag_fecha_documento,
            'vencimiento_neto' => $this->pag_vencimiento_neto,
            'moneda_documento' => $this->pag_moneda_documento,
            'forma_pago' => $this->tipo->tip_nombre,
            'estado' => $this->pag_estado,
        ];

        if ($isProveedor) return $data;

        return [
            'id' => $this->pag_id,
            'referencia' => $this->pag_referencia,
            'cuenta' => $this->pag_cuenta,
            'importe_moneda' => $this->pag_importe_moneda,
            'fecha_documento' => $this->pag_fecha_documento,
            'vencimiento_neto' => $this->pag_vencimiento_neto,
            'moneda_documento' => $this->pag_moneda_documento,
            'forma_pago' => $this->tipo->tip_nombre,
            'estado' => $this->pag_estado,
        ];
    }
}

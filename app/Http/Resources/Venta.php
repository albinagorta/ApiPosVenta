<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Detalle_venta as Detalle_ventaResource;

class Venta extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
       return [
            'id' => $this->id,
            'cliente' => $this->cliente,
            'tipo_comprobante' => $this->tipo_comprobante,
            'num_comprobante' => $this->num_comprobante,
            'descuento' => $this->descuento,
            'impuesto' => $this->impuesto,
            'neto' => $this->neto,
            'total' => $this->total,
            'metodo_pago' => $this->metodo_pago,
            'fh_crea' => $this->fh_crea,
            'user_crea' => new UserResource($this->usuario_crea),
            'fh_update' => $this->fh_update,
            'user_update' => new UserResource($this->usuario_update),
            'in_estado' => $this->in_estado,            
            'detalle_venta'=> Detalle_ventaResource::collection($this->detalle_venta)
            ];
    }
}

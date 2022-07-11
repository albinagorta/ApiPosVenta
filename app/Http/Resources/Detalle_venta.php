<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Producto as ProductoResource;
class Detalle_venta extends JsonResource
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
            'id' => $this->id,
            'producto' => new ProductoResource($this->producto),
            'cantidad' => $this->cantidad,
            'preciou' => $this->preciou,
            'subtotal' => $this->subtotal,
            ];
    }
}

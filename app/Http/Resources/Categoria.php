<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;

class Categoria extends JsonResource
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
            'nombre' => $this->nombre,
            'fh_crea' => $this->fh_crea,
            'fh_update' => $this->fh_update,
            // 'user_crea' => $this->user_crea,
            // 'user_update' => $this->user_update,
            'in_estado' => $this->in_estado,
            'user_crea' => new UserResource($this->usuario_crea),
            'user_update' => new UserResource($this->usuario_update)
            ];
    }
}

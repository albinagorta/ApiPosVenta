<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'rol' => $this->rol,
            'email' => $this->email,
            'fh_crea' => $this->created_at->format('Y-m-d H:i:s'),
            'fh_update' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
        
        //return parent::toArray($request);
    }
}

<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Categoria as CategoriaResource;
use App\Http\Resources\User as UserResource;

class Producto extends JsonResource
{
    

    public function toArray($request)
    {
       
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'codigo' => $this->codigo,
            'descripcion' => $this->descripcion,
            'imagen' => $this->imagen,
            'stock' => $this->stock,
            'precio' => $this->precio,
            'fh_crea' => $this->fh_crea,
            'fh_update' => $this->fh_update,
            // 'user_crea' => $this->user_crea,
            // 'user_update' => $this->user_update,
            'in_estado' => $this->in_estado,
            // 'id_categoria' => $this->id_categoria,
            'categoria' => new CategoriaResource($this->categoria),
            'user_crea' => new UserResource($this->usuario_crea),
            'user_update' => new UserResource($this->usuario_update)
        ];
    }
}

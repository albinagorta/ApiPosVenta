<?php

namespace App\Http\Controllers\api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Cliente as ClienteResource;
use App\models\Cliente;
class ClienteController extends BaseController
{
    public function index()
    {
        $cli = Cliente::all();

        return $this->sendResponse(ClienteResource::collection($cli), 'Clientes listado con éxito.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_crea'] = Auth::id();
        $input['fh_crea'] = date('Y-m-d H:i:s');
       

        $validator = Validator::make($input, [
            'nombre' => 'required',
            'tipo_documento' => 'required',
            'num_documento' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'direccion' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validación de error', $validator->errors());       
        }

        $cli = Cliente::create($input);
        return $this->sendResponse($cli, 'Cliente creado con éxito.');
        
    }

    public function show($id)
    {
        $cli = Cliente::find($id);
        if (is_null($cli)) {
            return $this->sendError('Cliente no encontrado.');
        }
   
        return $this->sendResponse($cli, 'Cliente listado con éxito.');
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'nombre' => 'required',
            'tipo_documento' => 'required',
            'num_documento' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'in_estado' => 'required|int|max:1|min:0'
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validación de error', $validator->errors());       
        }
        $cli = Cliente::find($id);   
        if (is_null($cli)) {
            return $this->sendError('Cliente no encontrado.');
        }
        $cli->nombre = $input['nombre'];
        $cli->in_estado = $input['in_estado'];
        $cli->fh_update = date('Y-m-d H:i:s');
        $cli->user_update = Auth::id();
        $cli->save();
   
        return $this->sendResponse($cli, 'Cliente actualizado con éxito.');
    }
}

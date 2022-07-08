<?php

namespace App\Http\Controllers\api\V1;

use Illuminate\Http\Request;
use App\models\User;
use App\Http\Controllers\api\BaseController;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\User as UserResource;
class UserController extends BaseController
{
    public function index()
    {
        $resp = User::all();

        return $this->sendResponse(UserResource::collection($resp), 'Usuarios listado con éxito.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        
        
        $validator = Validator::make($input, [
            'nombre' => 'required',
            'rol' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validación de error', $validator->errors());       
        }

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        return $this->sendResponse(new UserResource($user), 'Usuario creado con éxito.');
        
    }

    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return $this->sendError('Usuario no encontrado.');
        }
   
        return $this->sendResponse(new UserResource($user), 'Usuario listado con éxito.');
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'nombre' => 'required',
            'rol' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validación de error', $validator->errors());       
        }
        $user = User::find($id);   
        $user->nombre = $input['nombre'];
        $user->rol = $input['rol'];
        $user->email = $input['email'];
        $user->password =bcrypt($input['password']);
        $user->save();
   
        return $this->sendResponse(new UserResource($user), 'Usuario actualizado con éxito.');
    }

}

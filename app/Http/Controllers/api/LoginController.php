<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\api\BaseController;
use Illuminate\Support\Facades\Validator;
class LoginController extends BaseController
{

    public function login(Request $request)
    {   
        $input = $request->all();
        $validator = Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $user = User::where("email", "=", $request->email)->first();

        if( isset($user->id) ){
            if(Hash::check($request->password, $user->password)){
                //creamos el token
                $success['access_token'] =  $user->createToken($user->nombre)->plainTextToken; 
                $success['nombre'] =  $user->nombre;

                return $this->sendResponse($success, '¡Usuario logueado exitosamente!');
            }else{
                return $this->sendError('La password es incorrecta', ['error'=>'La password es incorrecta']);  
            }

        }else{
            return $this->sendError('Usuario no registrado', ['error'=>'Usuario no registrado']);
        }

    }

}

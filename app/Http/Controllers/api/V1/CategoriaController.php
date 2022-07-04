<?php

namespace App\Http\Controllers\api\V1;

use Illuminate\Http\Request;
use App\models\Categoria;
use App\Http\Controllers\api\BaseController;
use Illuminate\Support\Facades\Validator;
//class CategoriaController extends Controller
class CategoriaController extends BaseController
{

    public function index()
    {
        $cat = Categoria::all();

        return $this->sendResponse($cat, 'Categorias listado con éxito.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_crea'] = 1;
        $input['fh_crea'] = date('Y-m-d H:i:s');
        
        $validator = Validator::make($input, [
            'nombre' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validación de error', $validator->errors());       
        }

        $cat = Categoria::create($input);
        return $this->sendResponse($cat, 'Categoria creado con éxito.');
        
    }

    public function show($id)
    {
        $cat = Categoria::find($id);
        if (is_null($cat)) {
            return $this->sendError('Categoria no encontrado.');
        }
   
        return $this->sendResponse($cat, 'Categoria listado con éxito.');
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'nombre' => 'required',
            'in_estado' => 'required|int|max:1|min:0'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validación de error', $validator->errors());       
        }
        $cat = Categoria::find($id);   
        $cat->nombre = $input['nombre'];
        $cat->in_estado = $input['in_estado'];
        $cat->fh_update = date('Y-m-d H:i:s');
        $cat->user_update = 1;
        $cat->save();
   
        return $this->sendResponse($cat, 'Categoria actualizado con éxito.');
    }


    public function destroy($id)
    {
        // $cat = Categoria::find($id);
        // Categoria::destroy($id);
        // return $this->sendResponse($cat, 'Categoria eliminado con éxito.');

    }
}

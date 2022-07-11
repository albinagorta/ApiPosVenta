<?php

namespace App\Http\Controllers\api\V1;

use Illuminate\Http\Request;
use App\models\Producto;
use App\Http\Controllers\api\BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Resources\Producto as ProductoResource;
class ProductoController extends BaseController
{
    const destinationPath = 'image/productos/';

    public function index(Request $request)
    {
        $per_page = ($request->input('per_page'))?$request->input('per_page'):2;
        $pro = Producto::with('categoria','usuario_crea', 'usuario_update')->paginate($per_page);
        //die(json_encode($pro));
        return $this->sendResponse(($pro), 'Producto listado con éxito.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_crea'] = Auth::id();
        $input['fh_crea'] = date('Y-m-d H:i:s');
        
        $validator = Validator::make($input, [
            'id_categoria' => 'required|int',
            'nombre' => 'required',
            'codigo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg',
            'stock' => 'required|int|min:0',
            'precio' => 'required|numeric|min:0'
        ]);


        if($validator->fails()){
            return $this->sendError('Validación de error', $validator->errors());       
        }
        
        $input['imagen'] = self::SaveImagen($request->file('imagen'));

        $pro = Producto::create($input);
        return $this->sendResponse($pro, 'Producto creado con éxito.');
    }

    public function show($id)
    {
        $pro = Producto::find($id);
        if (is_null($pro)) {
            return $this->sendError('Producto no encontrado.');
        }
   
        return $this->sendResponse($pro, 'Producto listado con éxito.');
    }

    public function update(Request $request,$id,)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'id_categoria' => 'required|int',
            'nombre' => 'required',
            'codigo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg',
            'stock' => 'required|int|min:0',
            'precio' => 'required|numeric|min:0',
            'in_estado' => 'required|int|max:1|min:0'
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validación de error', $validator->errors());       
        }
        $pro = Producto::find($id);   
        if (is_null($pro)) {
            return $this->sendError('Producto no encontrado.');
        }
        
        $pro->id_categoria = $input['id_categoria'];
        $pro->nombre = $input['nombre'];
        $pro->codigo = $input['codigo'];
        $pro->descripcion = $input['descripcion'];
        $pro->imagen = self::SaveImagen($request->file('imagen'),$pro->imagen);
        $pro->stock = $input['stock'];
        $pro->precio = $input['precio'];
        $pro->in_estado = $input['in_estado'];
        $pro->fh_update = date('Y-m-d H:i:s');
        $pro->user_update = Auth::id();
        $pro->save();
   
        return $this->sendResponse($pro, 'Producto actualizado con éxito.');
    }

    public function SaveImagen($imagen,$imgen_2=''){
        if($imagen!=null){
            $nombreimagen = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move(self::destinationPath, $nombreimagen);
            if($imgen_2 != ''){
                
                if( File::exists(public_path(self::destinationPath.$imgen_2)) ) {
                    File::delete(public_path(self::destinationPath.$imgen_2));
                }
            }
            return $nombreimagen;
        }else{
            unset($imagen);
            return '';
        }
    }



}

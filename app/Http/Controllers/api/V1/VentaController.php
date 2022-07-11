<?php

namespace App\Http\Controllers\api\V1;


use Illuminate\Http\Request;
use App\models\Venta;
use App\models\Producto;
use App\models\Detalle_venta;
use App\Http\Controllers\api\BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Venta as VentaResource;
class VentaController extends BaseController
{

    public function index()
    {
        $cat = Venta::all();

        return $this->sendResponse(VentaResource::collection($cat), 'Venta listado con éxito.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_crea'] = Auth::id();
        $input['fh_crea'] = date('Y-m-d H:i:s');
        
        $validator = Validator::make($input, [
            'id_cliente' => 'required',
            'tipo_comprobante' => 'required',
            'num_comprobante' => 'required',
            'descuento' => 'required',
            'impuesto' => 'required',
            'neto' => 'required',
            'total' => 'required',
            'metodo_pago' => 'required',
            'detalle' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validación de error', $validator->errors());       
        }

        $ven = Venta::create($input);
        $detalle  = json_decode($input['detalle'],true);
        if($detalle != null) {
            foreach($detalle as $val){
                $val['id_venta'] = $ven['id'];
                Detalle_venta::create($val);

                $producto = Producto::find($val['id_producto']);
                $producto->stock = ($producto->stock-$val['cantidad']);
                $producto->save();
            }
        }  
         

        return $this->sendResponse(new VentaResource($ven), 'Venta creado con éxito.');
        
    }


    public function show($id)
    {
        $vent = Venta::find($id);
        if (is_null($vent)) {
            return $this->sendError('Venta no encontrado.');
        }
   
        return $this->sendResponse(new VentaResource($vent), 'Venta listado con éxito.');
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'in_estado' => 'required|int|max:1|min:0'
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validación de error', $validator->errors());       
        }

        $venta = Venta::find($id);   
        if (is_null($venta)) {
            return $this->sendError('Venta no encontrado.');
        }
        $venta->in_estado = $input['in_estado'];
        $venta->fh_update = date('Y-m-d H:i:s');
        $venta->user_update = Auth::id();
        $venta->save();
   
        return $this->sendResponse(new VentaResource($venta), 'Venta actualizado con éxito.');
    }

}

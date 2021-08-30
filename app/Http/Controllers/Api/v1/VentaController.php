<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Models\Venta;
use App\Http\Models\DetalleVenta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
 
 
    public function vender(Request $request) {

        $car = $request->cart;
        
        $v = Venta::create ([
            'id_usuario' => $request->usuario['id'],
            'venta_estado' => '1',
            'vent_celular' => $request->usuario['celular'],
            'vent_direccion' => $request->usuario['direccion'],
            'vent_latitud' => $request->usuario['ubicacion']['lat'],
            'vent_longitud' => $request->usuario['ubicacion']['lng'],
            'vent_cant_productos' => $request->cant,
            'vent_precio' => $request->precio,
        ]);

        foreach ($car as $c) {

            $this->insertar_venta_detalle($c, $v->id);
        }

        return response()->json([
            'data'=> $v->id,
            'message' => 'VENTA REALIZADA',
        ]);


    }

    public function insertar_venta_detalle($car, $id) {

        $dv = new DetalleVenta;

        $dv->id_venta = $id;
        $dv->id_prod = $car['id'];
        $dv->precio = $car['price'];
        $dv->discount = $car['discount'];
        $dv->cantidad = $car['cantidad'];

        $dv->save();
        
    }


};
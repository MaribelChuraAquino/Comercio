<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Cart;

class CartController extends Controller
{
    function add(Request $request){
        $producto = Producto::find($request->producto_id);
        
        Cart::add(
            $producto->id,  
            $producto->nombre,  
            $producto->precio_venta, 
            1,
            array("imagen"=>$producto->imagen),
           
        );
        return back()->with('mensaje',"$producto->nombre ¡se ha agregado con éxito al carrito!");
    }

    public function removeitem(Request $request) {
        Cart::remove([
        'id' => $request->id,
        ]);
        return back()->with('mensaje',"Producto eliminado con éxito de su carrito.");
    }
}

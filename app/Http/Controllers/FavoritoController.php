<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Marca;
use App\Favorito;

use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    function index($id){
        $favoritos = Favorito::where('persona_id', $id)
            ->orderBy('favoritos.created_at', 'desc')
            ->get();

        $productos = Producto::join('categorias','categorias.id', '=', 'productos.categoria_id')
            ->join('marcas', 'marcas.id', '=', 'productos.marca_id')
            ->join('ofertas', 'ofertas.id', '=' , 'productos.oferta_id')
            ->select('productos.*','marcas.nombre as marca','categorias.nombre as categoria', 'ofertas.descuento as oferta')
            ->get();

        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('paginas.favorito', compact('productos', 'categorias', 'marcas', 'favoritos'));
    }

    function agregar($id){
        try {
            Favorito::where('producto_id', $id)
                ->where('persona_id', Auth::id())
                ->firstOrFail();
            return back()->with('mensaje', 'El producto ya esta en su lista');
        } catch (\Throwable $th) {
            Favorito::create([
                'persona_id' => Auth::id(),
                'producto_id' => $id
            ]);
            return back()->with('mensaje', 'Añadido a favoritos exitosamente');
        }  
    }

    function eliminar($id){
        $favorito = Favorito::where('producto_id', $id)
            ->where('persona_id', Auth::id())
            ->firstOrFail();
        $favorito->delete();
        return back()->with('mensaje', 'Producto eliminado de favoritos');
    }
}

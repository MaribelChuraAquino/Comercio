<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index', compact('categorias'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        Categoria::create($request->all());
        return redirect('/inventario/categorias')->with("mensaje", "Producto guardado exitosamente"); 
    }

    public function show(Categoria $categoria)
    {
        //
    }

    public function edit(Categoria $categoria)
    {
        //
    }

    public function update(Request $request)
    {
        $categoria = Categoria::findOrFail($request->id);
        $categoria->nombre = $request->nombre;
        $categoria->condicion = 1;
        $categoria->save();
        return redirect('/inventario/categorias');
    }

    public function estado($id)
    {
        $categoria = Categoria::findOrFail($id);
        if($categoria->condicion){
            $categoria->condicion = 0;
        }else{
            $categoria->condicion = 1;
        }
        $categoria->save();
        return redirect('/inventario/categorias');
    }
}

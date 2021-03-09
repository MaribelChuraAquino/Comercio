<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('marca.index', compact('marcas'));
        // return view('marca.index');
        
    }

    public function edit($id){
        return Marca::find($id);
    }

    public function store(Request $request)
    {
        Marca::create($request->all());
        return redirect('/inventario/marcas')->with("mensaje", "Marca guardada exitosamente"); 
    }
    
    public function show(Request $request, $id){
        
    }
    
    public function update(Request $request)
    {
        $marca = Marca::findOrFail($request->id);
        $marca->nombre = $request->nombre;
        $marca->condicion = 1;
        $marca->save();
        return redirect('/inventario/marcas');
    }

    public function estado($id)
    {
        $marca = Marca::findOrFail($id);
        if($marca->condicion){
            $marca->condicion = 0;
        }else{
            $marca->condicion = 1;
        }
        $marca->save();
        return redirect('/inventario/marcas');
    }
}

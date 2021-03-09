<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oferta;

class OfertaController extends Controller
{
    public function index()
    {
        $ofertas = Oferta::all();
        return view('oferta.index', compact('ofertas'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        Oferta::create($request->all());
        return back()->with("mensaje", "Oferta guardada exitosamente"); 
    }

    public function show(oferta $oferta)
    {
        //
    }

    public function edit(oferta $oferta)
    {
        //
    }

    public function update(Request $request)
    {
        $oferta = Oferta::findOrFail($request->id);
        $oferta->nombre = $request->nombre;
        $oferta->condicion = 1;
        $oferta->save();
        return redirect('/inventario/ofertas');
    }

    public function estado($id)
    {
        $oferta = Oferta::findOrFail($id);
        if($oferta->condicion){
            $oferta->condicion = 0;
        }else{
            $oferta->condicion = 1;
        }
        $oferta->save();
        return redirect('/inventario/ofertas');
    }
}

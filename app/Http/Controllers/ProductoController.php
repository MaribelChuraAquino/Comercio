<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Marca;
use App\Oferta;
use Illuminate\Http\Request;
use App\Producto;

use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::join('categorias','categorias.id','=','productos.categoria_id')
            ->join('marcas','marcas.id','=','productos.marca_id')
            ->join('ofertas','ofertas.id','=','productos.oferta_id')
            ->select('productos.*','marcas.nombre as marca','categorias.nombre as categoria', 'ofertas.descuento as oferta')
            ->get();       
        foreach ($productos as $producto) {
            $producto->imagenes = json_decode($producto->imagenes);
        }
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $ofertas = Oferta::all();

        // $productos_mas_vendidos = Producto::join('categorias','categorias.id','=','productos.categoria_id')
        //     ->join('marcas','marcas.id','=','productos.marca_id')
        //     ->join('ofertas','ofertas.id','=','productos.oferta_id')
        //     ->select('productos.*','marcas.nombre as marca','categorias.nombre as categoria')
        //     ->where()
        //     ->get(); 

        return view('producto.index', compact('productos','marcas','categorias', 'ofertas'));
    }

    public function show()
    {
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $ofertas = Oferta::all();
        return view('producto.nuevo_producto', compact('categorias', 'marcas', 'ofertas') );
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        dd($producto);   
    }

    // public function store(Request $request)
    // {
    //     $imagen = $request->file('imagen');
    //     $nombre = time().'.'.$imagen->getClientOriginalExtension();
    //     $destino = public_path('img/productos');
    //     $request ->imagen->move($destino, $nombre);
        
    //     $producto = new Producto();
    //     $producto->cod = $request->cod;
    //     $producto->nombre = $request->nombre;
    //     $producto->descripcion = $request->descripcion;
    //     $producto->precio_venta = $request->precio_venta;
    //     $producto->categoria_id = $request->categoria_id;
    //     $producto->marca_id = $request->marca_id;
    //     $producto->imagen = $nombre;
    //     $producto->save();
    //     return redirect('/inventario/productos');         
    // }

    public function store(Request $request)
    {
        $imagenes = $request->file('imagenes');
        $nombre_imagenes = '["'.$request->file('imagen')->getClientOriginalName().'"';
        foreach($imagenes as $file){
            $nombre_imagen = $file->getClientOriginalName();
            $file->move('inventario/img', $nombre_imagen);
            if ($nombre_imagenes=='[') {
                $nombre_imagenes=$nombre_imagenes.'"'.$nombre_imagen.'"';
            }else{
                $nombre_imagenes=$nombre_imagenes.', "'.$nombre_imagen.'"';
            }
        }
        $nombre_imagenes = $nombre_imagenes.']';
        $nombre_imagen = $request->file('imagen')->getClientOriginalName();
        $request->file('imagen')->move('inventario/img', $nombre_imagen);     
        Producto::create([
            'cod' => $request->cod,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio_venta' => $request->precio_venta,
            'categoria_id' => $request->categoria_id,
            'marca_id' => $request->marca_id,
            'oferta_id' => $request->oferta_id,
            'imagen' => $nombre_imagen,
            'imagenes' => $nombre_imagenes
        ]);        
        // Retornamos un redirección hacía atras
        return redirect('/inventario/productos');
    }
    // public function store(Request $request)
    // {
    //     $imagenes = $request->file('imagenes');
    //     $nombre_imagenes = [];
    //     $i=0;
    //     foreach($imagenes as $file){
    //         $nombre_imagen = $file->getClientOriginalName();
    //         $file->move('inventario/img', $nombre_imagen);
    //         $nombre_imagenes[$i++] = $nombre_imagen;
    //     }
    //     $nombre_imagenes = json_decode($nombre_imagenes);
    //     $nombre_imagen = $request->file('imagen')->getClientOriginalName();
    //     $request->file('imagen')->move('inventario/img', $nombre_imagen);     
    //     Producto::create([
    //         'cod' => $request->cod,
    //         'nombre' => $request->nombre,
    //         'descripcion' => $request->descripcion,
    //         'precio_venta' => $request->precio_venta,
    //         'categoria_id' => $request->categoria_id,
    //         'marca_id' => $request->marca_id,
    //         'imagen' => "img/".$nombre_imagen,
    //         'imagenes' => $nombre_imagenes
    //     ]);        
    //     // Retornamos un redirección hacía atras
    //     return back();
    // }
    
    public function update(Request $request)
    {
        $producto = Producto::findOrFail($request->id);
        $producto->nombre = $request->nombre;
        $producto->condicion = 1;
        $producto->save();
        return redirect('/inventario/productos');
    }

    public function oferta(Request $request)
    {
        $producto = Producto::findOrFail($request->id);
        $producto->oferta_id = $request->oferta_id;
        $producto->save();
        return redirect('/inventario/productos');
    }

    public function estado($id)
    {
        $producto = Producto::findOrFail($id);
        if($producto->condicion){
            $producto->condicion = 0;
        }else{
            $producto->condicion = 1;
        }
        $producto->save();
        return redirect('/inventario/productos');
    }

    public function mostrar($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->imagenes = json_decode($producto->imagenes);

        
        $productos = Producto::join('categorias','categorias.id','=','productos.categoria_id')
            ->join('marcas','marcas.id','=','productos.marca_id')
            ->join('ofertas','ofertas.id','=','productos.oferta_id')
            ->where('productos.categoria_id','LIKE', '%' . $producto->categoria_id . '%' )
            ->select('productos.*','marcas.nombre as marca','categorias.nombre as categoria', 'ofertas.descuento as oferta')
            ->inRandomOrder()
            ->take(4)->get();

        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('paginas.detalle_producto', compact('producto', 'categorias', 'productos', 'marcas'));
    }

    public function inicio()
    {
        $productosrecientes = Producto::join('categorias','categorias.id','=','productos.categoria_id')
            ->join('marcas','marcas.id','=','productos.marca_id')
            ->join('ofertas','ofertas.id','=','productos.oferta_id')
            ->where('productos.condicion', 1)
            ->select('productos.*','marcas.nombre as marca','categorias.nombre as categoria','ofertas.descuento as oferta')
            ->orderBy('productos.created_at', 'desc')
            ->take(4)->get();

        $productosoferta = Producto::join('categorias','categorias.id','=','productos.categoria_id')
            ->join('marcas','marcas.id','=','productos.marca_id')
            ->join('ofertas','ofertas.id','=','productos.oferta_id')
            ->where('productos.oferta_id','<>', 1)
            ->select('productos.*','marcas.nombre as marca','categorias.nombre as categoria','ofertas.descuento as oferta')
            ->orderBy('productos.created_at', 'desc')
            ->take(4)->get();
            
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('paginas.principal', compact('productosrecientes', 'productosoferta', 'categorias', 'marcas'));
    }

    public function agregadosreciente()
    {
        $productos = Producto::join('categorias','categorias.id','=','productos.categoria_id')
            ->join('marcas','marcas.id','=','productos.marca_id')
            ->join('ofertas','ofertas.id','=','productos.oferta_id')
            ->where('productos.condicion', 1)
            ->select('productos.*','marcas.nombre as marca','categorias.nombre as categoria','ofertas.descuento as oferta')
            ->orderBy('productos.created_at', 'desc')
            ->take(40)->get();

        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('paginas.catalogo', compact('productos', 'categorias', 'marcas'));
    }

    public function enoferta()
    {
        $productos = Producto::join('categorias','categorias.id','=','productos.categoria_id')
            ->join('marcas','marcas.id','=','productos.marca_id')
            ->join('ofertas','ofertas.id','=','productos.oferta_id')
            ->where('productos.oferta_id','<>', 1)
            ->select('productos.*','marcas.nombre as marca','categorias.nombre as categoria','ofertas.descuento as oferta')
            ->orderBy('productos.created_at', 'desc')
            ->take(40)->get();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('paginas.catalogo', compact('productos', 'categorias', 'marcas'));
    }

    public function catalogo()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('paginas.catalogo', compact('productos', 'categorias', 'marcas'));
    }

    public function marca($marca)
    {
        $productos = Producto::join('ofertas','ofertas.id','=','productos.oferta_id')
            ->join('categorias','categorias.id','=','productos.categoria_id')
            ->where('marca_id', $marca)
            ->select('productos.*', 'ofertas.descuento as oferta', 'categorias.nombre as categoria')
            ->orderBy('productos.precio_venta', 'desc')
            ->get();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('paginas.catalogo', compact('productos', 'categorias', 'marcas'));
    }

    public function categoria($categoria)
    {   
        $productos = Producto::join('ofertas','ofertas.id','=','productos.oferta_id')
            ->join('categorias','categorias.id','=','productos.categoria_id')
            ->where('categoria_id', $categoria)
            ->select('productos.*', 'ofertas.descuento as oferta', 'categorias.nombre as categoria')
            ->orderBy('productos.precio_venta', 'desc')
            ->get();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('paginas.catalogo', compact('productos', 'categorias', 'marcas'));
    }

    public function buscar(Request $request)
    {   
        $productos = Producto::join('ofertas','ofertas.id','=','productos.oferta_id')
            ->join('categorias','categorias.id','=','productos.categoria_id')
            ->where('productos.nombre', 'like', '%' . $request->buscar . '%')
            ->select('productos.*', 'ofertas.descuento as oferta', 'categorias.nombre as categoria')
            ->get();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('paginas.catalogo', compact('productos', 'categorias', 'marcas'));
    }
}

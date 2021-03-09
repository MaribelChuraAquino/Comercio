<?php

use App\Http\Controllers\MarcaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/inventario/productos', function () {
    return view('producto');
});
Route::get('/inventario/categorias', 'CategoriaController@index');
Route::post('/inventario/categorias', 'CategoriaController@store');
Route::put('/inventario/categorias', 'CategoriaController@update');
Route::get('/inventario/categorias/estado/{id}', 'CategoriaController@estado');

Route::get('/inventario/marcas', 'MarcaController@index');
Route::post('/inventario/marcas', 'MarcaController@store');
Route::put('/inventario/marcas', 'MarcaController@update');
Route::get('/inventario/marcas/estado/{id}', 'MarcaController@estado');
Route::get('/inventario/show/{id}', 'MarcaController@index')->name('marca.show'); 
Route::get('/inventario/edit/{id}', 'MarcaController@edit')->name('marca.edit'); 

Route::get('/inventario/ofertas', 'OfertaController@index');
Route::post('/inventario/ofertas', 'OfertaController@store');
Route::put('/inventario/ofertas', 'OfertaController@update');
Route::get('/inventario/ofertas/estado/{id}', 'OfertaController@estado');

Route::get('/inventario/productos', 'ProductoController@index');
Route::get('/inventario/productos/crear', 'ProductoController@show')->name('productos.crear');
Route::get('/inventario/productos/editar/{id}', 'ProductoController@edit')->name('productos.editar');
Route::post('/inventario/productos', 'ProductoController@store');
Route::put('/inventario/productos', 'ProductoController@update');
Route::put('/inventario/productos/agregarofertas', 'ProductoController@oferta');
Route::get('/inventario/productos/estado/{id}', 'ProductoController@estado')->name('productos.condicion');
Route::get('/inventario/productos/{id}', 'ProductoController@mostrar')->name('productos.mostrar');
Route::get('/inventario/catalogo', 'ProductoController@catalogo')->name('productos.catalogo');
Route::get('/catalogo/agregados_recientemente', 'ProductoController@agregadosreciente')->name('productos.agregados_recientemente');
Route::get('/catalogo/en_oferta', 'ProductoController@enoferta')->name('productos.en_oferta');
Route::get('/inventario/catalogo/marca/{marca}', 'ProductoController@marca')->name('productos.catalogo.marca');
Route::get('/inventario/catalogo/categoria/{categoria}', 'ProductoController@categoria')->name('productos.catalogo.categoria');
Route::get('/inventario/catalogo/buscar', 'ProductoController@buscar')->name('productos.buscar');

Route::get('/inventario/productos/favoritos/{id}', 'FavoritoController@index')->name('favoritos.index');
Route::get('/inventario/productos/favoritos/agregar/{id}', 'FavoritoController@agregar')->name('favoritos.agregar');
Route::get('/inventario/productos/favoritos/eliminar/{id}', 'FavoritoController@eliminar')->name('favoritos.eliminar');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ProductoController@inicio')->name('inicio');
Route::get('/registrar', 'Auth\RegisterController@show')->name('registrar.usuario');
Route::get('/registrar/nuevo', 'Auth\RegisterController@store')->name('registrar.nuevo');
Route::get('/salir', 'Auth\LoginController@logout')->name('salir');

Route::post('/cart-add', 'CartController@add')->name('cart.add');
Route::post('/cart-removeitem', 'CartController@removeitem')->name('cart.removeitem');

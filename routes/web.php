<?php

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

Route::get('/', function () {
    return view('servicio/welcome');
});

Auth::routes();

Route::get('/home', 'servicio\HomeController@index');

Route::get('index', 'servicio\PostsController@index');

Route::get('quejas', 'servicio\PostsController@queja');
Route::get('grafica', 'servicio\PostsController@grafica');
Route::get('filtro', 'servicio\PostsController@filtro');
Route::get('status', 'servicio\PostsController@status');

Route::get('ubicacion', 'servicio\EntradaController@ubicacion');

//servicios gernerales
Route::get('salida', 'servicio\PostsController@salida');
Route::get('entrada', 'servicio\PostsController@entrada');
Route::get('refaciones', 'servicio\PostsController@refaciones');
Route::get('limpieza', 'servicio\PostsController@limpieza');
Route::get('electronica', 'servicio\PostsController@electronica');
Route::get('medicina', 'servicio\PostsController@medicina');
Route::get('tonner', 'servicio\PostsController@tonner');

Route::get('unidad', 'servicio\UnidadController@index');
Route::get('articulos', 'servicio\EntradaController@mostrar');
Route::get('cancelados', 'servicio\EntradaController@cancelados');
Route::get('canceladosvue', 'servicio\EntradaController@canceladosvue');
Route::get('verificarproducto', 'servicio\EntradaController@verificarproducto');
Route::get('reactivar', 'servicio\EntradaController@reactivar');
Route::get('mostrarsalidas', 'servicio\SalidaController@mostrarsalidas');
Route::get('graficavue', 'servicio\GraficaController@index');
Route::get('cargarcancelados', 'servicio\GraficaController@cargararticulosCancelados');
Route::get('cargarclientes', 'servicio\ClienteController@cargar');
Route::get('cancelarsalida/{id}', 'servicio\SalidaController@cancelarsalida');

Route::get('mosclientes', 'servicio\ClienteController@mostrar');
Route::get('mostraruser', 'servicio\UsersController@mostrar');
Route::get('mosalidas', 'servicio\SalidaController@mostrar');
Route::get('mostrararticulos', 'servicio\EntradaController@mostrarArticulos');
Route::get('guardarSalida', 'servicio\SalidaController@guadar');
Route::post('guardarBD', 'servicio\SalidaController@guardar');
Route::get('pruebas', 'servicio\SalidaController@pruebas');
Route::get('crear', 'servicio\SalidaController@crearWord');
Route::get('especifico', 'servicio\SalidaController@especifico');
//Route::get('historial', 'SalidaController@historial');
Route::post('historial', 'servicio\SalidaController@historial');

//son las rutas donde se actulizar los productos
Route::post('editar', 'servicio\EntradaController@editar');
Route::post('actualizararticulo', 'servicio\EntradaController@actual');

//Serivicios fromArray
Route::get('tab', 'servicio\ExcelController@tabla');
Route::get('tab2', 'servicio\ExcelController@tabla2');
Route::get('buscarexcel', 'servicio\ExcelController@buscar');

//ruta de Excel
Route::get('/export-users', 'servicio\ExcelController@exportUsers');
Route::get('/export-entradas', 'servicio\ExcelController@exportEntradas');
Route::get('/export-salidas', 'servicio\ExcelController@exportSalidas');
Route::get('/export-productos', 'servicio\ExcelController@exportProducto');
Route::get('/export-mensual', 'servicio\ExcelController@exportMensual');
Route::get('/export-cancelado', 'servicio\ExcelController@exportCancelados');
Route::get('/export-prueba', 'servicio\ExcelController@pruebaexcel');

Route::get('/export-refaciones', 'servicio\ExcelController@exportrefaciones');
//consumir
Route::get('traerUnidad', 'servicio\UnidadController@traerUnidad');
Route::get('traerCliente', 'servicio\ClienteController@traerCliente');
Route::get('pendientes', 'servicio\PostsController@pendiente');
Route::get('cliente', 'servicio\PostsController@cliente');

Route::get('howto', function (){

    return view('howto');

});

Route::group(['middleware'=> 'Role:admin'], function(){

    Route::get('posts/delete/{id}', 'servicio\PostsController@destroy');

    Route::post('posts', 'servicio\PostsController@store');
    Route::get('/clientes', 'servicio\ClienteController@guardar');
    Route::get('/unidades', 'servicio\UnidadController@guardar');
    Route::get('/entradas', 'servicio\EntradaController@guardar');
    Route::get('/entradasRefa', 'servicio\EntradaController@guardar2');
    Route::get('/entradasLimpieza', 'servicio\EntradaController@guardarLimpieza');
    Route::get('/entradasElectronica', 'servicio\EntradaController@guardarElectronica');
    Route::get('/entradasMedicina', 'servicio\EntradaController@guardarMedicina');
    Route::get('/entradasTonner', 'servicio\EntradaController@guardarTonner');

    Route::get('/posts/editposts/{id}', 'servicio\PostsController@show');

    Route::post('/posts/editposts/{id}', 'servicio\PostsController@update');

    Route::get('/users/editprofile/{id}', 'servicio\UsersController@show');
    Route::get('/eliminarArticulo/{id}', 'servicio\EntradaController@eliminar');

    Route::post('/users/editprofile/{id}', 'servicio\UsersController@update');

    Route::get('users/delete/{id}', 'servicio\UsersController@destroy');

    Route::get('users/deleteaccount/{id}', 'servicio\UsersController@accountDown');

});

Route::group(['middleware'=> 'Role:admin'], function(){

    Route::get('users/manageprofiles', 'servicio\UsersController@index');
    Route::get('users/guardaruser', 'servicio\UsersController@guardaruser');

});

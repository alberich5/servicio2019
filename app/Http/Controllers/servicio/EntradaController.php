<?php

namespace App\Http\Controllers\servicio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entrada;
use App\Log;
use DB;

class EntradaController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');

  }

  public function guardar(Request $request)
  {
    //calcular iva
    $preci= $request->get('precio');
    $iva=($preci*0.16)+$preci;

    $entrada=new Entrada;
        $entrada->id_usuario=$request->get('id_usuario');
        $entrada->id_unidad=$request->get('unidad');
        $entrada->fecha_ingreso=$request->get('fecha');
        $entrada->descripcion=strtoupper($request->get('descripcion'));
        $entrada->marca=strtoupper($request->get('marca'));
        $entrada->precio=$request->get('precio');
        $entrada->precio_iva=$iva;
        $entrada->cantidad=$request->get('cantidad');
        $entrada->cantidadOriginal=$request->get('cantidad');
        $entrada->status='activo';
        $entrada->ubicacion=strtoupper($request->get('ubicacion'));
        $entrada->tipo='papeleria';
        $entrada->motivo='';
        $entrada->save();

      $entradas = Entrada::orderBy('created_at', 'desc')
      ->limit(1)->get();
      $identrada="";
      $canti_ini="";
      foreach ($entradas as $entra) {
          $identrada = $entra->id;
          $canti_ini = $entra->cantidad;
      }

      $log=new Log;
      $log->id_entrada=$identrada;
      $log->cantidad_inicial=$canti_ini;
      $log->tipo='entradaPapeleria';
      $log->fecha_log=$request->get('fecha');
      $log->save();

      return redirect('articulos');
  }

  public function guardar2(Request $request)
  {
    //calcular iva
    $preci= $request->get('precio');
    $iva=($preci*0.16)+$preci;

      $entrada=new Entrada;
      $entrada->id_usuario=$request->get('id_usuario');
      $entrada->id_unidad=$request->get('unidad');
      //$entrada->fecha_ingreso=$request->get('fecha');
      $entrada->fecha_ingreso='2017-12-01';
      $entrada->descripcion=strtoupper($request->get('descripcion'));
      $entrada->marca=strtoupper($request->get('marca'));
      $entrada->precio=$request->get('precio');
      $entrada->precio_iva=$iva;
      $entrada->cantidad=$request->get('cantidad');
      $entrada->cantidadOriginal=$request->get('cantidad');
      $entrada->status='activo';
      $entrada->ubicacion=strtoupper($request->get('ubicacion'));
      $entrada->tipo='refaccion';
      //$entrada->ubicacion='pendiente';
      $entrada->motivo='';
      $entrada->destinado=strtoupper($request->get('destinado'));
      $entrada->save();

      $entradas = Entrada::orderBy('created_at', 'desc')
      ->limit(1)->get();
      $identrada="";
      $canti_ini="";
      foreach ($entradas as $entra) {
          $identrada = $entra->id;
          $canti_ini = $entra->cantidad;
      }

      $log=new Log;
      $log->id_entrada=$identrada;
      $log->cantidad_inicial=$canti_ini;
      $log->tipo='entradaRefaccion';
      $log->fecha_log=$request->get('fecha');
      $log->save();
      return redirect('articulos');
  }

  public function guardarLimpieza(Request $request)
  {
    //calcular iva
    $preci= $request->get('precio');
    $iva=($preci*0.16)+$preci;
    $entrada=new Entrada;
        $entrada->id_usuario=$request->get('id_usuario');
        $entrada->id_unidad=$request->get('unidad');
        $entrada->fecha_ingreso=$request->get('fecha');
        $entrada->descripcion=strtoupper($request->get('descripcion'));
        $entrada->marca=strtoupper($request->get('marca'));
        $entrada->precio=$request->get('precio');
        $entrada->precio_iva=$iva;
        $entrada->cantidad=$request->get('cantidad');
        $entrada->cantidadOriginal=$request->get('cantidad');
        $entrada->status='activo';
        $entrada->ubicacion=strtoupper($request->get('ubicacion'));
        $entrada->tipo='limpieza';
        $entrada->motivo='';
        $entrada->save();

      $entradas = Entrada::orderBy('created_at', 'desc')
      ->limit(1)->get();
      $identrada="";
      $canti_ini="";
      foreach ($entradas as $entra) {
          $identrada = $entra->id;
          $canti_ini = $entra->cantidad;
      }
      $log=new Log;
      $log->id_entrada=$identrada;
      $log->cantidad_inicial=$canti_ini;
      $log->tipo='entradaLimpieza';
      $log->fecha_log=$request->get('fecha');
      $log->save();
      return redirect('articulos');
  }

  public function guardarElectronica(Request $request)
  {
    //calcular iva
    $preci= $request->get('precio');
    $iva=($preci*0.16)+$preci;
    $entrada=new Entrada;
        $entrada->id_usuario=$request->get('id_usuario');
        $entrada->id_unidad=$request->get('unidad');
        $entrada->fecha_ingreso=$request->get('fecha');
        $entrada->descripcion=strtoupper($request->get('descripcion'));
        $entrada->marca=strtoupper($request->get('marca'));
        $entrada->precio=$request->get('precio');
        $entrada->precio_iva=$iva;
        $entrada->cantidad=$request->get('cantidad');
        $entrada->cantidadOriginal=$request->get('cantidad');
        $entrada->status='activo';
        $entrada->ubicacion=strtoupper($request->get('ubicacion'));
        $entrada->tipo='electronica';
        $entrada->motivo='';
        $entrada->save();

      $entradas = Entrada::orderBy('created_at', 'desc')
      ->limit(1)->get();
      $identrada="";
      $canti_ini="";
      foreach ($entradas as $entra) {
          $identrada = $entra->id;
          $canti_ini = $entra->cantidad;
      }
      $log=new Log;
      $log->id_entrada=$identrada;
      $log->cantidad_inicial=$canti_ini;
      $log->tipo='entradaElectronica';
      $log->fecha_log=$request->get('fecha');
      $log->save();
      return redirect('articulos');
  }

  public function guardarMedicina(Request $request)
  {
    //calcular iva
    $preci= $request->get('precio');
    $iva=($preci*0.16)+$preci;
    $entrada=new Entrada;
        $entrada->id_usuario=$request->get('id_usuario');
        $entrada->id_unidad=$request->get('unidad');
        $entrada->fecha_ingreso=$request->get('fecha');
        $entrada->descripcion=strtoupper($request->get('descripcion'));
        $entrada->marca=strtoupper($request->get('marca'));
        $entrada->precio=$request->get('precio');
        $entrada->precio_iva=$iva;
        $entrada->cantidad=$request->get('cantidad');
        $entrada->cantidadOriginal=$request->get('cantidad');
        $entrada->status='activo';
        $entrada->ubicacion=strtoupper($request->get('ubicacion'));
        $entrada->tipo='medicina';
        $entrada->motivo='';
        $entrada->save();

      $entradas = Entrada::orderBy('created_at', 'desc')
      ->limit(1)->get();
      $identrada="";
      $canti_ini="";
      foreach ($entradas as $entra) {
          $identrada = $entra->id;
          $canti_ini = $entra->cantidad;
      }
      $log=new Log;
      $log->id_entrada=$identrada;
      $log->cantidad_inicial=$canti_ini;
      $log->tipo='entradaMedicina';
      $log->fecha_log=$request->get('fecha');
      $log->save();
      return redirect('articulos');
  }

  public function guardarTonner(Request $request)
  {
    //calcular iva
    $preci= $request->get('precio');
    $iva=($preci*0.16)+$preci;
    $entrada=new Entrada;
        $entrada->id_usuario=$request->get('id_usuario');
        $entrada->id_unidad=$request->get('unidad');
        $entrada->fecha_ingreso=$request->get('fecha');
        $entrada->descripcion=strtoupper($request->get('descripcion'));
        $entrada->marca=strtoupper($request->get('marca'));
        $entrada->precio=$request->get('precio');
        $entrada->precio_iva=$iva;
        $entrada->cantidad=$request->get('cantidad');
        $entrada->cantidadOriginal=$request->get('cantidad');
        $entrada->status='activo';
        $entrada->ubicacion=strtoupper($request->get('ubicacion'));
        $entrada->tipo='tonner';
        $entrada->motivo='';
        $entrada->save();

      $entradas = Entrada::orderBy('created_at', 'desc')
      ->limit(1)->get();
      $identrada="";
      $canti_ini="";
      foreach ($entradas as $entra) {
          $identrada = $entra->id;
          $canti_ini = $entra->cantidad;
      }
      $log=new Log;
      $log->id_entrada=$identrada;
      $log->cantidad_inicial=$canti_ini;
      $log->tipo='entradaTonner';
      $log->fecha_log=$request->get('fecha');
      $log->save();
      return redirect('articulos');
  }


  public function mostrar()
  {
    $entradas = Entrada::leftjoin('unidad', 'entrada.id_unidad', '=', 'unidad.id')
  ->select('entrada.id','entrada.id_usuario','entrada.id_unidad','entrada.fecha_ingreso','entrada.descripcion','entrada.marca','entrada.precio','entrada.precio_iva','entrada.cantidad','entrada.ubicacion','entrada.cantidadOriginal','entrada.status','entrada.motivo','unidad.nombre')
  ->where('status','=', 'activo')
  ->orderBy('entrada.created_at', 'desc')
  ->paginate(10);

    return view('servicio.funciones.articulos',compact("entradas"));

  }
  public function cancelados()
  {
    $entradas = Entrada::orderBy('created_at', 'desc')
    ->where('status','=', 'cancelado')
    ->paginate(10);
    return view('servicio.funciones.cancelados',compact("entradas"));

  }

  public function canceladosvue()
  {
    $entradas = Entrada::orderBy('created_at', 'desc')
    ->where('status','=', 'cancelado')
    ->get();

    return $entradas;

  }



  public function mostrarArticulos(Request $request)
  {
    $consul=strtoupper($request->get('query'));
    $entradas = Entrada::leftjoin('unidad', 'entrada.id_unidad', '=', 'unidad.id')
    ->select('entrada.id','entrada.id_usuario','entrada.id_unidad','entrada.fecha_ingreso','entrada.descripcion','entrada.marca','entrada.precio','entrada.ubicacion','entrada.precio_iva','entrada.cantidad','entrada.cantidadOriginal','entrada.status','entrada.motivo','unidad.nombre')
    ->where('entrada.descripcion','like', "%".$consul."%")
    ->where('entrada.status','=', 'activo')
    ->orderBy('entrada.created_at', 'asc')
    ->get();
    //dd($entradas);

      $total = count($entradas);
    for ($i=0; $i <$total ; $i++) {
        $entradas[$i]->prueba=0;
    }
      if ($total>=1) {
      return $entradas;
      }else{
        return $entradas;
      }

    return $entradas;
  }

  public function reactivar(Request $request)
  {
    $motivo=strtoupper($request->get('motivo'));
    $entrada=Entrada::findOrFail($request->get('id'));
    $entrada->status='activo';
    $entrada->motivo=$motivo;
    $entrada->update();
    return "se reactivo producto";
  }

  public function verificarproducto(Request $request)
  {
          $quey=strtoupper($request->get('query'));
          $buscado = Entrada::orderBy('created_at', 'asc')
          ->where('descripcion','like', "%".$quey."%")
          ->where('status','=', 'activo')
          ->get();
           $cnta=count($buscado);

    return $cnta;
  }

  public function eliminar($id)
  {

    $entrada = Entrada::orderBy('created_at', 'desc')
    ->where('id','=', $id)
    ->get();

    $cantoriginal="";
    $cantinicial="";
    foreach ($entrada as $entra) {
        $cantoriginal = $entra->cantidadOriginal;
        $cantinicial = $entra->cantidad;
    }

    if ($cantoriginal == $cantinicial ) {
      $entrada=Entrada::findOrFail($id);
      $entrada->status='cancelado';
      $entrada->update();
        return redirect('articulos');
    }else{
      dd("no se puede elimnar porque ya ubo salida");
    }


    return redirect('articulos');
  }

  public function destroy($id)
  {

      dd("entro al destruir de los articulos");
  }

  public function editar(Request $request)
  {
    $post=Entrada::findOrFail($request->get('id'));

    return view('servicio/funciones/editar',compact('post'));
  }

  public function actual(Request $request)
  {


    $entrada=Entrada::findOrFail($request->get('id_entrada'));
    $entrada->fecha_ingreso=$request->get('fecha');
    $entrada->descripcion=$request->get('descripcion');
    $entrada->marca=$request->get('marca');
    $entrada->precio=$request->get('precio');
    $entrada->cantidad=$request->get('cantidad');
    $entrada->cantidadOriginal=$request->get('cantidad');
    $entrada->ubicacion=$request->get('ubicacion');
    $entrada->update();


    DB::table('log')
            ->where('id_entrada', $request->get('id_entrada'))
            ->update(['cantidad_inicial' => $request->get('cantidad')]);

    return redirect('articulos');
  }


  public function ubicacion(Request $request)
  {

    return view('servicio/funciones/ubicacion');
  }



}

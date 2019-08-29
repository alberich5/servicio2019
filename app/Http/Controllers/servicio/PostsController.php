<?php

namespace App\Http\Controllers\servicio;
use App\Http\Controllers\Controller;

use App\Post;
use App\Status;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    //funcion para mostrar el index
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('servicio.funciones.posts',compact("posts"));
    }
    //funcion para mostrar las quejas
    public function queja()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('quejas',compact("posts"));
    }

    //funcion para salidas
    public function salida()
    {
        return view('servicio.funciones.salida');
    }
    //funcion para salidas
    public function salidarefaccion()
    {
        return view('servicio.funciones.salidaRefaccion');
    }
    //funcion para salidas
    public function salidarelimpieza()
    {
        return view('servicio.funciones.salidaLimpieza');
    }
    public function salidarelectronica()
    {
        return view('servicio.funciones.salidaElectronica');
    }
    public function salidarmedicina()
    {
        return view('servicio.funciones.salidaMedicina');
    }
    public function salidartonner()
    {
        return view('servicio.funciones.salidaTonner');
    }


    //funcion para entradas
    public function entrada()
    {
        return view('servicio.funciones.entrada');
    }

    public function refaciones()
    {
        return view('servicio.funciones.entradaRefaciones');
    }
    public function limpieza()
    {
        return view('servicio.funciones.entradaLimpieza');
    }
    public function electronica()
    {
        return view('servicio.funciones.entradaElectronica');
    }
    public function medicina()
    {
        return view('servicio.funciones.entradaMedicina');
    }
    public function tonner()
    {
        return view('servicio.funciones.entradaTonner');
    }
    //funcion para entradas
    public function cliente()
    {
        return view('servicio.funciones.cliente');
    }

    //funcion para mostrar las graficas
    public function grafica()
    {

        return view('servicio.excel.grafica');
    }

    //funcion para mostrar filtro
    public function filtro()
    {

        return view('filtro');
    }

    //funcion para mostrar quejas atendidas
    public function atendida()
    {
        $posts = Post::select('nombre_usuario','contenido','status')->where('status','atendida')->get();
        return $posts;
    }

    public function status()
    {
         $status = Status::all();
        return $status;
    }

     //funcion para mostrar quejas pendientes
    public function pendiente()
    {
        $posts = Post::select('nombre_usuario','contenido','status')->where('status','pendiente')->get();
        return $posts;
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'id_usuario'=>'required',
           'nombre_usuario' => 'required',
            'contenido' => 'required',
            'fecha' => 'required',
            'empresa' => 'required',
            'mes' => 'required',
            'representante' => 'required',
            'delegacion' => 'required',
            'delegacion' => 'required',
        ]);
        //dd($request->all());
        Post::create($request->all());

        return redirect('quejas');
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('posts');
    }

    public function show($id)
    {
        $post=Post::findOrFail($id);

        return view('posts/editposts',compact('post'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'id_usuario'=>'required',
            'nombre_usuario' => 'required',
            'contenido' => 'required',
        ]);
        $post = Post::findOrFail($id);
        $input = $request->all();
        $post->fill($input)->save();

        return redirect("quejas");
    }

}

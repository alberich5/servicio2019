@extends('servicio.layouts.app')

@section('content')
  <div class="container" id="articulos">
    <center><h1>Listado de Articulos</h1></center>
<div id="articulo">
    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="table-responsive">
    			<table class="table table-striped table-bordered table-condensed table-hover">
    				<thead>
    					<th>Id</th>
              <th>Fecha Ingreso</th>
    					<th>Descripcion</th>
    					<th>Marca</th>
              <th>Medida</th>
              <th>Precio sin Iva</th>
    					<th>Precio con Iva</th>
    					<th>Stock</th>
              <th style="background-color: #F7F5EF;">Ubicacion</th>
              <th style="background-color: #DBECFF;">Tipo</th>
              <th>Opciones</th>
    				</thead>
                   @foreach ($entradas as $entra)
            <tbody>
    					<td>{{ $entra->id}}</td>
              <td>{{ $entra->fecha_ingreso}}</td>
              <td>
                @if('0'  == $entra->cantidad)
                  <span class="label label-warning">{{ $entra->descripcion}}</span>
                @endif
                @if('0'  < $entra->cantidad)
                  {{ $entra->descripcion}}
                @endif
              </td>
              <td>{{ $entra->marca}}</td>
              <td>{{ $entra->nombre}}</td>
              <td>$ {{ $entra->precio}}</td>
    					<td>$ {{ $entra->precio_iva}}</td>
              <td>
                @if('0'  == $entra->cantidad)
                  <span class="label label-warning">{{ $entra->cantidad}}</span>
                @endif
                @if('0'  < $entra->cantidad)
                  {{ $entra->cantidad}}
                @endif
              </td>
              <td style="background-color: #F7F5EF;"><strong>{{ $entra->ubicacion}}</strong></td>
              <td style="background-color: #DBECFF; text-transform: uppercase;"><strong>{{ $entra->tipo}}</strong></td>
              <td>
                @if($entra->cantidadOriginal  == $entra->cantidad)

                <a href="/eliminarArticulo/{{$entra->id}}">
                        <button class="btn btn-primary">Eliminar</button>
                    </a>
                <form action="editar" class="form-horizontal" method="post">
                        <input type="hidden" class="form-control" name="id" value="{{$entra->id}}">
                      <input type="submit" class="btn btn-success" value="Editar" >
                  </form>
                @endif

              </td>

    				</tbody>
    				@endforeach
    			</table>
    		</div>
    		{{$entradas->render()}}
    	</div>
    </div>



</div>
<!--
<div class="row">
   <div class="col-xs-12">
     <pre>@{{$data}}</pre>
   </div>
 </div>-->
  </div>




  </div>


@endsection

@section('js')
<script type="text/javascript">
  var vm = new Vue({
          //id asignado al div en el que funcionara vue
          el: '#articulos',
          //funcion al crear el objet
          created: function() {
              this.articulos();
          },
          data:{
              articulos:[],
              unidad:[],
              mensaje:'',
              searchUsuario:{'username':'','nombre':'','paterno':'','materno':''},
                  },
          methods:{
              Eliminar:function(id){
                var msj = id;
                alert("eliminar"+msj);
              },
              articulos:function(){

              },
      }});
  </script>

@endsection

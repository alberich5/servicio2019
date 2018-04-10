@extends('servicio.layouts.app')

@section('content')
  <div class="container" id="articulos">
    <center><h1></h1></center>
<div id="articulo">
    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="table-responsive">
    			<table class="table table-striped table-bordered table-condensed table-hover">
    				<thead>
              <th>Fecha Ingreso</th>
    					<th>Descripcion</th>
    					<th>Marca</th>
              <th>Medida</th>
              <th>Precio sin Iva</th>
    					<th>Precio con Iva</th>
    					<th>Inicial</th>
              <th>Salidas</th>
              <th>Final</th>
              <th>Costo Final</th>
    				</thead>
                   @foreach ($root as $ro)
            <tbody>
              	<td>
                  @if('0'  == $ro->existenciafina)
                    <span class="label label-info">{{ $ro->fecha_ingreso}}</span>
                  @endif
                  @if('0'  < $ro->existenciafina)
                    {{ $ro->fecha_ingreso}}
                  @endif
                  </td>
                <td>{{ $ro->descripcion}}</td>
                <td>{{ $ro->marca}}</td>
                <td>{{ $ro->nombre}}</td>
                <td>{{ $ro->precio}}</td>
                <td>{{ $ro->precio_iva}}</td>
                <td>{{ $ro->existenciaini}}</td>
                <td>{{ $ro->salidas}}</td>
                <td>{{ $ro->existenciafina}}</td>
                <td>{{ $ro->costo_final}}</td>
    				</tbody>
    				@endforeach
    			</table>
    		</div>
        {{$root->render()}}
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

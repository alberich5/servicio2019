@extends('servicio.layouts.app')

@section('content')
  <div class="container" id="app">
        @if(count($errors) > 0)
            <div class="errors">
                <ul class="alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <div id="unidad">





    <center><h2>Salidas</h2></center>
    <div class="row">
    	<div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
    		<div class="table-responsive">
    			<table class="table table-striped table-bordered table-condensed table-hover">
    				<thead>
              <!--<th>Id Salida</th>-->
              <th>Nombre del Cliente</th>
              <th>Usuario que Entrego</th>
              <th>Cantidad que Salio</th>
              <th>Producto</th>
              <th>Fecha de Salida</th>
              @if(Auth::user()->rol == 'admin')
              <th>Opciones</th>
              @endif
    				</thead>
                   @foreach ($salidas as $sali)
    				<tr>

              <!--<td >{{ $sali->id}}</td>-->
                <td >{{ $sali->nombre}}</td>
              <td>{{ $sali->name}}</td>
              <td>{{ $sali->cantidad}}</td>
              <td>{{ $sali->descripcion}}</td>
              <td>{{ $sali->fecha_salida}}</td>
              <td>
                  @if(Auth::user()->rol == 'admin')
                <a href="{{URL::action('servicio\SalidaController@cancelarsalida',$sali->id)}}"><button class="btn btn-danger">cancelar</button>
                  @endif
              </td>
    				</tr>

    				@endforeach
    			</table>
    		</div>
        {{$salidas->render()}}
    	</div>
    </div>

  </div>
  </div>



@endsection

@section('js')


@endsection

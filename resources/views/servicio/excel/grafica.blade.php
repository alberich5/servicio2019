@extends('servicio.layouts.app')

@section('content')
    <div class="container" id="salida">

      <div class="descargas">


@if(Auth::user()->rol == 'admin')
      <form action="export-users" class="form-horizontal" method="get">
        <center><h3>Reportes</h3></center>
        <input type="submit" class="btn btn-primary" value="Usuarios Registrados" >
    </form>
    <br><br>
    <form action="export-cancelado" class="form-horizontal" method="get">

      <input type="submit" class="btn btn-primary" value="Entradas Canceladas" >
  </form>
  <br>
  <form action="export-productos" class="form-horizontal" method="get">
  <div class="form-group">
      <div class="col-sm-6">
        <label for="fecha">Productos en 0:</label><br>
          <input type="submit" class="btn btn-primary" value="Productos en Cero" >
      </div>

  </div>
  </form>
@endif

  <br><br>
    <form action="export-entradas" class="form-horizontal" method="get">
    <div class="form-group">
        <div class="col-sm-6">
          <label for="fecha">Entradas del Dia:</label>
            <input type="date" class="form-control" name="fecha" value="<?php echo date("Y-m-d");?>" >
            <input type="submit" class="btn btn-primary" value="Entradas del Dia" >
        </div>

    </div>
    </form>
    <br>
    <form action="export-salidas" class="form-horizontal" method="get">
    <div class="form-group">
        <div class="col-sm-6">
          <label for="fecha">Salidas del Dia:</label>
            <input type="date" class="form-control" name="fecha" value="<?php echo date("Y-m-d");?>" >
            <input type="submit" class="btn btn-primary" value="Salidas del Dia" >
        </div>

    </div>
    </form>



    <br>
    <form action="export-mensual" class="form-horizontal" method="get">
    <div class="form-group">
        <div class="col-sm-6">

            <input type="submit" class="btn btn-primary" value="Descargar Papeleria" >
        </div>

    </div>
    </form>
    <br>
    <form action="export-refaciones" class="form-horizontal" method="get">
        <div class="form-group">
            <div class="col-sm-6">
                <input type="submit" class="btn btn-primary" value="Descargar Refaciones" >
            </div>
        </div>
   </form>
   <br>
   <form action="export-limpieza" class="form-horizontal" method="get">
       <div class="form-group">
           <div class="col-sm-6">
               <input type="submit" class="btn btn-primary" value="Descargar Material de Limpieza" >
           </div>
       </div>
  </form>
  <br>
  <form action="export-electronica" class="form-horizontal" method="get">
      <div class="form-group">
          <div class="col-sm-6">
              <input type="submit" class="btn btn-primary" value="Descargar Electronica y Electrica" >
          </div>
      </div>
 </form>
 <br>
 <form action="export-medicina" class="form-horizontal" method="get">
     <div class="form-group">
         <div class="col-sm-6">
             <input type="submit" class="btn btn-primary" value="Descargar Medicina" >
         </div>
     </div>
</form>
<br>
<form action="export-tonner" class="form-horizontal" method="get">
    <div class="form-group">
        <div class="col-sm-6">
            <input type="submit" class="btn btn-primary" value="Descargar Tonner e impresoras" >
        </div>
    </div>
</form>
</div>
    </div>
@endsection
@section('js')
  <script type="text/javascript">
    var vm = new Vue({
            //id asignado al div en el que funcionara vue
            el: '#salida',
            //funcion al crear el objet
            created: function() {
              this.enviar();
            },
            data:{
                clientes:[],
                buscar:'',
                    },
            methods:{
                salida:function(){
                  swal("Agregado Correctamente", "Se agrego bien", "success");
                },
        }});
    </script>
@endsection

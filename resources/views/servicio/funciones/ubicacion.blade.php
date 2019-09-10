@extends('servicio.layouts.app')

@section('content')
  <div class="container" id="app">
    <center><h1>Ubicacion del producto</h1></center>


        @if(count($errors) > 0)
            <div class="errors">
                <ul class="alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif



  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-info">
              <div class="panel-heading"><center>Ubicacion del Articulo</center></div>
              <div class="panel-body">
                <div class="col-sm-5">
                  <label for="buscar">Buscar:</label>
                    <input type="search" class="form-control" name="Buscar" v-model="buscar" style="text-transform: uppercase;">
                </div>
                <div class="col-sm-3">
                    <input type="submit" class="btn btn-primary" value="Buscar" v-on:click="mostrarArticulos()">
                </div>
                <table class="table table-striped table-bordered table-condensed table-hover">
                  <thead>
                    <th>Id</th>
                    <th>Fecha Ingreso</th>
                    <th>Descripcion</th>
                    <th>Marca</th>
                    <th>Medida</th>
                    <th>Ubicacion</th>
                    <th>Cantidad</th>
                    <th>Opciones</th>
                  </thead>
                  <tbody>
                    <tr v-for="(art, index) in articulos">
                      <td v-text="art.id"></td>
                      <td v-text="art.fecha_ingreso"></td>
                      <td v-text="art.descripcion"></td>
                      <td v-text="art.marca"></td>
                      <td v-text="art.nombre"></td>
                      <td v-text="art.ubicacion"></td>
                      <td v-text="art.cantidad"></td>
                      <td><button type="button" class="btn btn-primary" v-on:click.prevent="abastercer(art.id)">Agregar</button></td>
                    </tr>
                  </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>

  @include('servicio.funciones.Reabastecer')

  <!--<div class="row">
    <div class="col-xs-12">
      <pre>@{{$data}}</pre>
    </div>
  </div>-->

</div>



@endsection


@section('js')
<script type="text/javascript">

  var vm = new Vue({
          //id asignado al div en el que funcionara vue
          el: '#app',
          //funcion al crear el objet
          created: function() {
            this.enviar();
          },
          data:{
              clientes:[],
              respuesta:'',
              descripcion:'',
              marca:'',
              precio:'',
              cantidad:'1',
              buscar:'',
              clienteSelecionado:'1',
              cantidad:'',
              cantidad2:'',
              reabastecer:'',
              reabastecerId:'',
              veri:'',
              articulos:[],
              totalCargado:[],
              fecha:'',
              prueba3:'',
              searchUsuario:{'username':'','nombre':'','paterno':'','materno':''},
                  },
          methods:{
              enviar:function(){
                var urlStatus = '/traerCliente';
                axios.get(urlStatus).then(response => {
                this.clientes = response.data
              });
              },
              mostrarArticulos:function(){
                if (this.clienteSelecionado>0) {
                  var urlStatus = '/mostrararticulosubica?query=' + this.buscar;
                    axios.get(urlStatus).then(response => {
                    this.articulos = response.data
                    this.veriificarexistencia();
                  });

                }else{
                  swal('Seleciona Cliente','Seleciona','info');
                }

              },
              agregar:function(art, index){
                this.cantidad=art.prueba;
                if(this.cantidad > 0){
                    if(art.prueba <= art.cantidad){
                      this.totalCargado.push({
                        "id": art.id,
                        "id_usuario": art.id_usuario,
                        "id_unidad": art.id_unidad,
                        "fecha_ingreso": art.fecha_ingreso,
                        "descripcion": art.descripcion,
                        "marca": art.marca,
                        "medida": art.nombre,
                        "precio": art.precio,
                        "precio_iva": art.precio_iva,
                        "cantidad": art.cantidad,
                        "otro": this.cantidad,
                        "cliente": this.clienteSelecionado
                      });

                      //this.totalCargado[index].otro=this.cantidad;
                      swal("Agregado Correctamente", "Se agrego bien", "success");
                      this.cantidad2=this.cantidad;
                      this.cantidad="0";
                      this.articulos=[];

                      this.Checar();
                    }else{
                      swal('NO','Agrega cantidad mayor a 0 verifica q no supere el stock','error');
                    }



                }else{
                  swal('Agrega cantidad','Agrega cantidad mayor a 0','info');
                }

              },

              quitarEl: function(index) {
                this.totalCargado.splice(index, 1);
                swal('Removido...','Se quito elemento','error');

              },

              Checar: function() {
              },

              abastercer:function(id){
                $('#modalAbastecerArticulo').modal('show');
                this.reabastecerId=id;
              },
              storeAbastecer:function(){
                //alert(this.reabastecer); 
                  var url= '/abastercer';
                  axios.post(url,{
                    idarticulo:this.reabastecerId,
                    cantidadabastecer: this.reabastecer
                  }).then(response=>{
                    $('#modalAbastecerArticulo').modal('hide'); 
                    swal("Se Agrego la cantidad de  "+this.reabastecer, "Muy Bien", "success");
                    
                    this.reabastecer='';
                    this.reabastecerId='';
                  }).catch(error=>{
                  });
                             
              },


              guadarBD:function(){
                //var querystr = jQuery.param(this.totalCargado); // hacemos el querystring tomando los valores
                  //alert(querystr);
                //  alert("entro");
                if(this.totalCargado.length == 0){
                  swal('NO HAY PRODUCTOS','NO HAY PRODUCTOS','info');
                }else{
                  var urlStatus = '/verificarproducto?query='+this.buscar;
                  axios.get(urlStatus).then(response => {
                  this.veri = response.data
                });
                  if(this.veri<1){
                    swal('NOTA','PUEDE QUE TENGAS PRODUCTOS MAS ANTIGUOS','info');
                  }else{
                    var urlGuardar = 'guardarBD';
                    axios.post(urlGuardar,{
                      variable:this.totalCargado
                    }).then(response => {
                     this.respuesta = response.data
                     this.descargar();
                       swal("Se Agregaron "+this.respuesta+" Productos", "Muy Bien", "success");
                       this.totalCargado=[];
                       this.respuesta="";
                       this.clienteSelecionado="";
                  });
                  }

                }

              },
              descargar: function() {
                 window.open('crear?cliente='+this.clienteSelecionado);

              },
              veriificarexistencia: function() {
                if(this.articulos.length<1){
                  swal('NO SE ENCONTRO EL PRODUCTO','VERIFICA EL NOMBRE = '+this.buscar,'info');
                }
              },
      }});
  </script>

@endsection

<div class="modal fade" id="modalAbastecerArticulo" data-backdrop="static">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">
    <span>&times;</span>
  </button>
  <center><h3>Abastecer Articulo</h3></center>
</div>
<div class="modal-body">
  <div class="col-sm-12">
   <div class="form-group">
    <label >Cantidad</label>
     <input required type="number"  min="1" class="form-control" v-model="reabastecer">
   </div>
 </div><!--Fin del div abstecer-->


</div>

<div class="modal-footer">

  <button type="button" class="btn btn-md btn-success"  @click.prevent="storeAbastecer()">
    <span class="glyphicon glyphicon-ok"></span>
    Agregar
  </button>

  
</div>
</div>
</div>
</div>

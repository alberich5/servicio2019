@extends('servicio.layouts.app')
@section('css')
  <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container" style="margin-top:7%;">
      <div id="slider">
        <div class="slides">
          <div class="slider">
            <div class="legend"></div>
            <div class="content">
              <div class="content-txt">
                <h1>Papeleria</h1>
                <h2 id="color">Todo lo relacionado a Papeleria con lo que utilizan las Areas de la Policia Auxiliar, Bancaria y Comercial.</h2>
              </div>
            </div>
            <div class="image">
              <img src="https://http2.mlstatic.com/material-de-papeleria-y-oficina-D_NQ_NP_823411-MLM20534249891_122015-F.jpg">
            </div>
          </div>
          <div class="slider">
            <div class="legend"></div>
            <div class="content">
              <div class="content-txt">
                <h1>Refacciones</h1>
                <h2 id="color">Todo lo relacionado a Refacciones con lo que utilizan las Areas de la Policia Auxiliar, Bancaria y Comercial.</h2>
              </div>
            </div>
            <div class="image">
              <img src="https://blog.segundamano.mx/wp-content/uploads/2018/10/Blog_autopartes.jpg">
            </div>
          </div>
          <div class="slider">
            <div class="legend"></div>
            <div class="content">
              <div class="content-txt">
                <h1>Material de Limpieza</h1>
                <h2 id="color">Todo lo relacionado de Limpieza con lo que utilizan las Areas de la Policia Auxiliar, Bancaria y Comercial.</h2>
              </div>
            </div>
            <div class="image">
              <img src="http://blog.flota.es/wp-content/uploads/2015/12/productos-limpieza-basicos.jpg">
            </div>
          </div>
          <div class="slider">
            <div class="legend"></div>
            <div class="content">
              <div class="content-txt">
                <h1>Electrica y Electronica</h1>
                <h2 id="color">Todo lo relacionado con lo que utilizan las Areas de la Policia Auxiliar, Bancaria y Comercial.</h2>
              </div>
            </div>
            <div class="image">
              <img src="https://mlstaticquic-a.akamaihd.net/materiales-e-insumos-electricos-para-la-industria-y-el-hogar-D_NQ_NP_920137-MLU27706369742_072018-F.jpg">
            </div>
          </div>
        </div>

      </div>
    </div>
@endsection

@section('js')

@endsection

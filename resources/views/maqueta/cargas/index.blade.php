@extends('layouts.layouts')
@section('title', 'Carga masiva de información') 
@section('js_personalizado') 
<script src="{{ asset('public/js/jquery/select2-4.0.7/dist/js/select2-init.js') }}"></script> 
<script src="{{ asset('public/js/jquery/select2-4.0.7/dist/js/select2.js') }}"></script> 
@endsection
@section('content')
<div class="card mb-4">
  <div class="card-body">
    <div class="row">
      <div class="mb-3 mb-lg-0 col-lg-6 align-self-center">
        <h1 class="mb-0">Carga masiva de información</h1>
      </div>
      <div class="col-lg-6">
        <div class="row justify-content-md-end">
          <div class="mb-3 mb-md-0 col-sm-6 pl">
            <select id="planta_carga" name="planta_carga" style="width: 100%;">
              <option>Seleccione planta</option>
              <option></option>
            </select>
          </div>
          <div class="col-sm-6 col-md-3 bt">
            <button class="btn btn-success text-nowrap" style="width: 100%;"  data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Subir archivo masivo <img src="/public/imagenes/sitio/import.png" width="14" height="16" alt="subir" /></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="card-body collapse"  id="collapseExample">
    <div class=" ">
      <h2 class="h1">Subir archivo</h2>
      <div class="tex-center" >
        <label for="file_arch" class="text-file"> Subir certificado de calidad <img src="/public/imagenes/sitio/i-file.svg" alt="">
          <input id="file_arch" type="file" name="certificado_calidad" class="file-simple" accept=".pdf">
        </label>
      </div>
    </div>
  </div>
</div>
<div class="card mb-3">
  <div class="card-body">
    <div class="row">
      <div class="mb-3 mb-md-0 col-md-7">
        <h1 class="mb-0">Detalle de la carga masiva</h1>
      </div>
      <div class="col-md-5 mb-3 text-end"> <a class="btn btn-success waves-effect waves-float waves-light" href="#">Descargar Excel <i class="fas fa-file-excel fa-fw"></i></a> </div>
    </div>
    <div class="table-responsive bd-lr">
      <table class="table table-borderless" style="min-width: 650px;" cellspacing="0" cellpadding="0" border="0">
        <thead>
          <tr>
            <th>Archivo</th>
            <th>Fila</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Usuario</th>
          </tr>
        </thead>
        <tbody>
        <td>Carga-masiva-08-02-2023.xlsx</td>
          <td>5</td>
          <td>08-02-2023</td>
          <td>11:21:19</td>
          <td>Super</td>
        </tr>
        <tr>
          <td>Carga-masiva-08-02-2023.xlsx</td>
          <td>5</td>
          <td>08-02-2023</td>
          <td>11:21:19</td>
          <td>Super</td>
        </tr>
        <tr>
          <td>Carga-masiva-08-02-2023.xlsx</td>
          <td>5</td>
          <td>08-02-2023</td>
          <td>11:21:19</td>
          <td>Super</td>
        </tr>
          </tbody>
        
      </table>
    </div>
  </div>
</div>
@endsection 
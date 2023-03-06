@extends('layouts.layouts')
@section('title', 'Consulta visualización de pagos') 
@section('js_personalizado') 
<script src="{{ asset('js/jquery/select2-4.0.7/dist/js/select2-init.js') }}"></script> 
<script src="{{ asset('js/jquery/select2-4.0.7/dist/js/select2.js') }}"></script> 
@endsection
@section('content')
<div class="card mb-4">
  <div class="card-body">
    <div class="row mb-4">
      <div class="mb-3 mb-lg-0 col-lg-6 align-self-center">
        <h1 class="mb-0">Consulta visualización de pagos</h1>
      </div>
      <div class="col-lg-6">
        <div class="row justify-content-md-end"> 
          <!--<div class="mb-3 mb-md-0 col-sm-6 pl">
            <select id="planta_carga" name="planta_carga" style="width: 100%;">
              <option>Seleccione planta</option>
              <option></option>
            </select>
          </div>-->
          <div class="col-sm-6 col-md-3 pp">
            <button class="btn btn-success text-nowrap" style="width: 100%;">Buscar <i class="fa-light fa-magnifying-glass fa-fw"></i></button>
          </div>
          <div class="col-sm-6 col-md-3 pp">
            <button class="btn btn btn-link text-nowrap" style="width: 100%;">Limpiar filtro <i class="fa-light fa-circle-minus fa-fw"></i></button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="mb-3 col-sm-6 col-md-4">
        <label for="cp_inicio" class="form-label">Desde fecha</label>
        <input type="date" class="form-control" id="cp_inicio" name="cp_inicio" />
      </div>
      <div class="mb-3 col-sm-6 col-md-4">
        <label for="fh_fin" class="form-label">Fecha y hora término</label>
        <input type="datetime-local" class="form-control" id="fh_fin" name="fh_fin">
      </div>
      <div class="mb-3 col-sm-6 col-md-4">
        <label for="cp_planta" class="form-label">Planta</label>
        <select id="cp_planta" name="cp_planta" class="form-select" style="width:100%;">
          <option selected>Todos</option>
          <option>Descarga de naves</option>
          <option>Ducto</option>
          <option>Isla de carga</option>
          <option>Tanques</option>
        </select>
      </div>
    </div>
  </div>
</div>
<div class="card mb-3">
  <div class="card-body">
    <div class="row">
      <div class="mb-3 mb-md-0 col-md-7">
        <h1 class="mb-0">Detalle</h1>
      </div>
      <div class="col-md-5 mb-3 text-end"> <a class="btn btn-success waves-effect waves-float waves-light" href="#">Descargar Excel <i class="fas fa-file-excel fa-fw"></i></a> </div>
    </div>
    <div class="table-responsive bd-lr">
      <table class="table table-borderless" style="min-width: 650px;" cellspacing="0" cellpadding="0" border="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Archivo</th>
            <th>Cuenta</th>
            <th>Importe en<br />
              moneda</th>
            <th>Fecha doc</th>
            <th>Vencimiento Neto</th>
            <th>Moneda doc</th>
            <th>Forma de pago</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>5</td>
            <td>17/02/2023 - 10:44</td>
            <td>76.123.456-7</td>
            <td>125400</td>
            <td>08-02-2023</td>
            <td>Vale Vista</td>
            <td>Pendiente</td>
            <td>Dato 1.8</td>
            <td class="text-center"><a href="/maqueta/pagos/detalle/"><img src="/public/imagenes/sitio/i-ojo.svg" alt="Ver" width="14" height="16" /></a></td>
          </tr>
          <tr>
            <td>6</td>
            <td>17/02/2023 - 10:44</td>
            <td>76.123.456-7</td>
            <td>125400</td>
            <td>08-02-2023</td>
            <td>Vale Vista</td>
            <td>Pendiente</td>
            <td>Dato 1.8</td>
            <td class="text-center"><a href="/maqueta/pagos/detalle/"><img src="/public/imagenes/sitio/i-ojo.svg" alt="Ver" width="14" height="16" /></a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection 
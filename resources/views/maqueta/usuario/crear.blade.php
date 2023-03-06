@extends('layouts.layouts')
@section('title', 'Consulta visualización de pagos') 
@section('js_personalizado') 
<script src="{{ asset('js/jquery/select2-4.0.7/dist/js/select2-init.js') }}"></script> 
<script src="{{ asset('js/jquery/select2-4.0.7/dist/js/select2.js') }}"></script> 
@endsection
@section('content')
<div class="card mb-4">
  <div class="card-body">
    <div class="mb-4">
      <h1 class="mb-0">Nuevo usuario</h1>
    </div>
    <div class="list-group mb-4">
      <div class="list-group-item">
        <div class="row">
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="us_nombre" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="us_nombre" name="us_nombre" />
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="us_apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="us_apellido" name="fus_apellidoh_fin">
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="us_celular" class="form-label">Celular</label>
            <input type="text" class="form-control" id="us_celular" name="us_celular">
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="us_email" class="form-label">Email</label>
            <input type="text" class="form-control" id="us_email" name="us_email">
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="us_password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="us_password" name="us_password">
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="us_identificación" class="form-label">Identificación</label>
            <input type="text" class="form-control" id="us_identificación" name="us_identificación">
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="us_tipo" class="form-label">Tipo de usuario</label>
            <select id="us_tipo" name="us_tipo" class="form-select" style="width:100%;">
              <option selected>Todos</option>
              <option>Descarga de naves</option>
              <option>Ducto</option>
              <option>Isla de carga</option>
              <option>Tanques</option>
            </select>
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="us_planta" class="form-label">Planta</label>
            <select id="us_planta" name="us_planta" class="form-select" style="width:100%;">
              <option selected>Seleccione planta</option>
              <option>Antofagasta</option>
              <option>Ti til</option>
            </select>
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="us_estado" class="form-label">Estado</label>
            <select id="us_estado" name="us_estado" class="form-select" style="width:100%;">
              <option selected>Seleccione estado</option>
              <option>Activo</option>
              <option>Inactivo</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-md-end">
      <div class="mb-3 mb-sm-0 col-sm-6 pp">
        <button class="btn btn-link text-nowrap" style="width: 100%;">Cancelar <i class="fa-light fa-circle-xmark fa-fw"></i></button>
      </div>
      <div class="col-sm-6 col-md-3">
        <button class="btn btn-success text-nowrap" style="width: 100%;">Guardar nuevo usuario <i class="fa-light fa-floppy-disk fa-fw"></i></button>
      </div>
    </div>
  </div>
</div>
@endsection 
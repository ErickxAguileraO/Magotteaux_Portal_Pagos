@extends('layouts.layouts')
@section('title', 'Nuevo proveedor') 
@section('js_personalizado') 
<script src="{{ asset('js/jquery/select2-4.0.7/dist/js/select2-init.js') }}"></script> 
<script src="{{ asset('js/jquery/select2-4.0.7/dist/js/select2.js') }}"></script> 
@endsection
@section('content')
<div class="card mb-4">
  <div class="card-body">
    <div class="mb-4">
      <h1 class="mb-0">Nuevo proveedor</h1>
    </div>
    <div class="list-group mb-4">
      <div class="list-group-item">
        <div class="row">
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="pro_razon" class="form-label">Razón social</label>
            <input tabindex="1" type="text" class="form-control" id="pro_razon" name="pro_razon" />
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="pro_identificacion" class="form-label">Identificación (RUT, DNI, etc)</label>
            <input tabindex="2" type="text" class="form-control" id="pro_identificacion" name="pro_identificacion">
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="pro_pais" class="form-label">País</label>
            <select tabindex="3" id="pro_pais" name="pro_pais" class="form-select" style="width:100%;">
              <option selected>Seleccione</option>
              <option>Chile</option>
              <option>Otro</option>
            </select>
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="pro_email1" class="form-label">Email 1</label>
            <input tabindex="4" type="text" class="form-control" id="pro_email1" name="pro_email1">
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="pro_email12" class="form-label">Email 2</label>
            <input tabindex="5" type="text" class="form-control" id="pro_email12" name="pro_email12">
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="pro_cel" class="form-label">Teléfono de contacto</label>
            <input type="text" class="form-control" id="pro_cel" name="pro_cel">
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="us_estado" class="form-label">Estado</label>
            <select tabindex="6" id="us_estado" name="us_estado" class="form-select" style="width:100%;">
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
        <button class="btn btn-success text-nowrap" style="width: 100%;">Guardar nuevo proveedor <i class="fa-light fa-floppy-disk fa-fw"></i></button>
      </div>
    </div>
  </div>
</div>
@endsection 
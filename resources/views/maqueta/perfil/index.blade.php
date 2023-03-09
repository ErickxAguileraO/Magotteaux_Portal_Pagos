@extends('layouts.layouts')
@section('title', 'Editar mi perfil') 
@section('js_personalizado') 
@endsection
@section('content')
<div class="card mb-4">
  <div class="card-body">
    <div class="mb-4">
      <h1 class="mb-0">Editar mi perfil</h1>
    </div>
    <div class="list-group mb-4">
      <div class="list-group-item">
        <div class="row">
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="password_1" class="form-label">Contraseña actual</label>
            <input tabindex="1" type="password" class="form-control" id="password_1" name="password_1" />
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="password_2" class="form-label">Contraseña nueva</label>
            <input tabindex="2" type="text" class="form-control" id="password_2" name="password_2">
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="password_3" class="form-label">Confirmar contraseña</label>
            <input tabindex="3" type="text" class="form-control" id="password_3" name="password_3">
            
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="pro_email1" class="form-label">Email 1</label>
            <input type="text" class="form-control" id="pro_email1" name="pro_email1">
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <label for="pro_email12" class="form-label">Email 2</label>
            <input type="text" class="form-control" id="pro_email12" name="pro_email12">
          </div>
          
        </div>
      </div>
    </div>
    <div class="row justify-content-md-end">
      <div class="mb-3 mb-sm-0 col-sm-6 pp">
        <button class="btn btn-link text-nowrap" style="width: 100%;">Cancelar <i class="fa-light fa-circle-xmark fa-fw"></i></button>
      </div>
      <div class="col-sm-6 col-md-3">
        <button class="btn btn-success text-nowrap" style="width: 100%;">Guardar contraseña <i class="fa-light fa-floppy-disk fa-fw"></i></button>
      </div>
    </div>
  </div>
</div>
@endsection 
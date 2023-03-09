@extends('layouts.sistema')
@section('title', 'Consulta visualización de pagos')
@section('js_personalizado')
@endsection
@section('content')
<div class="row">
  <div class="mb-3 mb-md-0 col-md-3 col-lg-2">
    <div class="card">
      <div class="card-body">
        <ul class="menu">
          <li><a href="{{ route('usuario.index') }}"><i class="fa-regular fa-user fa-fw"></i> Usuarios</a></li>
          <li class="active"><a href="{{ route('proveedor.index') }}"><i class="fa-light fa-user-group fa-fw"></i> Proveedores</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-9 col-lg-10">
    <div class="card mb-4">
      <div class="card-body">
        <div class="row">
          <div class="mb-3 mb-sm-0 col-sm-7 align-self-center">
            <h1 class="mb-0">Mantenedor de proveedores</h1>
          </div>
          <div class="col-sm-5 text-end">
            <div class="pl" style="display:inline-block;"> <a class="btn btn-success text-nowrap" style="width: 100%;" href="{{ route('proveedor.create') }}">Crear nuevo proveedor <i class="fa-light fa-circle-plus fa-fw"></i></a> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card mb-3">
      <div class="card-body">
        <div class="row mb-4">
          <div class="mb-4 mb-md-0 col-md-7 align-self-center">
            <h1 class="mb-0">Detalle</h1>
          </div>
          <div class="col-md-5 text-end"> <a class="btn btn-success" href="#">Descargar Excel <i class="fas fa-file-excel fa-fw"></i></a> </div>
        </div>
        <div class="table-responsive bd-lr">
          <table class="table table-borderless" style="min-width: 650px;" cellspacing="0" cellpadding="0" border="0">
            <thead>
              <tr>
                <th>Razón social</th>
                <th>Identificación</th>
                <th>País</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>BHP Minerals</td>
                <td>76.123.456-7</td>
                <td>Chile</td>
                <td>Activo</td>
                <td class="text-center"><a class="text-success" href="/maqueta/proveedor/crear/" title="Editar"><i class="fa-light fa-pencil fa-fw"></i></a>
                  <button class="text-danger eliminar" type="button" title="Eliminar"><i class="fa-regular fa-trash fa-fw"></i></button></td>
              </tr>
              <tr>
                <td>Aeurus</td>
                <td>76.123.456-7</td>
                <td>Chile</td>
                <td>Activo</td>
                <td class="text-center"><a class="text-success" href="/maqueta/proveedor/crear/" title="Editar"><i class="fa-light fa-pencil fa-fw"></i></a>
                  <button class="text-danger eliminar" type="button" title="Eliminar"><i class="fa-regular fa-trash fa-fw"></i></button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

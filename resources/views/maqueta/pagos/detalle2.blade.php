@extends('layouts.layouts')
@section('title', 'Detalle factura') 
@section('js_personalizado') 
@endsection
@section('content')
<div class="card mb-4">
  <div class="card-body">
    <div class="row mb-4">
      <div class="mb-3 mb-md-0 col-md-7">
        <h1 class="mb-0"><a class="h2" href="/maqueta/pagos/proveedor/"><i class="fa-solid fa-circle-arrow-left fa-fw"></i></a> Detalle factura - Proveedor 1</h1>
      </div>
      <div class="col-md-5 mb-3 text-end"> <a class="btn btn-success" href="#">Descargar Excel <i class="fas fa-file-excel fa-fw"></i></a> </div>
    </div>
    <div class="list-group mb-4">
      <div class="list-group-item">
        <h2 class="text-20 bd">Factura <span class="pendiente">Pendiente</span></h2>
        <div class="row">
          <div class="mb-3 col-sm-6 col-md-4">
            <p class="mb-0">Cuenta<br />
              <strong class="text-18">xxx-xxx-xxx</strong></p>
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <p class="mb-0">Fecha del documento<br />
              <strong class="text-18">17-02-2023 / 10:44</strong></p>
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <p class="mb-0">Moneda del documento<br />
              <strong class="text-18">Peso</strong></p>
          </div>
          <div class="col-sm-6 col-md-4">
            <p class="mb-0">Forma de pago<br />
              <strong class="text-18">Vale Vista</strong></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 
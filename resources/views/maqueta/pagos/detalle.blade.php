@extends('layouts.layouts')
@section('title', 'Consulta visualización de pagos') 
@section('js_personalizado') 
@endsection
@section('content')
<div class="card mb-4">
  <div class="card-body">
    <div class="row mb-4">
      <div class="mb-3 mb-md-0 col-md-7">
        <h1 class="mb-0"><a class="h2" href="/maqueta/pagos/"><i class="fa-solid fa-circle-arrow-left fa-fw"></i></a> Detalle factura</h1>
      </div>
      <div class="col-md-5 mb-3 text-end"> <a class="btn btn-success waves-effect waves-float waves-light" href="#">Descargar Excel <i class="fas fa-file-excel fa-fw"></i></a> </div>
    </div>
    <div class="list-group mb-4">
      <div class="list-group-item">
        <h2 class="text-20 bd">Factura <span>Pagado</span></h2>
        <div class="row">
          <div class="mb-3 col-sm-6 col-md-4">
            <p class="mb-0">Referencia<br />
              <strong class="text-18">125400</strong></p>
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <p class="mb-0">Cuenta<br />
              <strong class="text-18">xxx-xxx-xxx</strong></p>
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <p class="mb-0">Importe en moneda doc.<br />
              <strong class="text-18">$1.850.400</strong></p>
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <p class="mb-0">Fecha del documento<br />
              <strong class="text-18">17-02-2023 / 10:44</strong></p>
          </div>
          <div class="mb-3 col-sm-6 col-md-4">
            <p class="mb-0">Vencimiento neto<br />
              <strong class="text-18">18-02-2023</strong></p>
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
    <div class="list-group">
      <div class="list-group-item">
        <h2 class="text-20 bd">Cliente</h2>
        <div class="row">
          <div class="mb-3 mb-sm-0 col-sm-6 col-md-4">
            <p class="mb-0">N° de identificación fiscal<br />
              <strong class="text-18">76.123.456</strong></p>
          </div>
          <div class="col-sm-6 col-md-4">
            <p class="mb-0">Razón social<br />
              <strong class="text-18">Empresa de transporte 1</strong></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 
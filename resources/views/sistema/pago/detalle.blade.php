@extends('layouts.sistema')
@section('title', 'Consulta visualización de pagos')
@section('content')
   <div class="card mb-4">
      <div class="card-body">
         <div class="row mb-4">
            <div class="mb-3 mb-md-0 col-md-7">
               <h1 class="mb-0"><a class="h2" href="/maqueta/pagos/"><i class="fa-solid fa-circle-arrow-left fa-fw"></i></a> Detalle factura</h1>
            </div>
            <div class="col-md-5 mb-3 text-end">
               <a class="btn btn-success waves-effect waves-float waves-light" href="{{ route('pago.download.excel', ['id' => $pago->pag_id]) }}">
                  Descargar Excel <i class="fas fa-file-excel fa-fw"></i>
               </a>
            </div>
         </div>
         <div class="list-group mb-4">
            <div class="list-group-item">
               <h2 class="text-20 bd">Factura <span>{{ $pago->pag_estado }}</span></h2>
               <div class="row">
                  <div class="mb-3 col-sm-6 col-md-4">
                     <p class="mb-0">Referencia<br />
                        <strong class="text-18">{{ $pago->pag_referencia }}</strong>
                     </p>
                  </div>
                  <div class="mb-3 col-sm-6 col-md-4">
                     <p class="mb-0">Cuenta<br />
                        <strong class="text-18">{{ $pago->pag_cuenta }}</strong>
                     </p>
                  </div>
                  <div class="mb-3 col-sm-6 col-md-4">
                     <p class="mb-0">Importe en moneda doc.<br />
                        <strong class="text-18">{{ $pago->pag_importe_moneda }}</strong>
                     </p>
                  </div>
                  <div class="mb-3 col-sm-6 col-md-4">
                     <p class="mb-0">Fecha del documento<br />
                        <strong class="text-18">{{ $pago->pag_fecha_documento }}</strong>
                     </p>
                  </div>
                  <div class="mb-3 col-sm-6 col-md-4">
                     <p class="mb-0">Vencimiento neto<br />
                        <strong class="text-18">{{ $pago->pag_vencimiento_neto }}</strong>
                     </p>
                  </div>
                  <div class="mb-3 col-sm-6 col-md-4">
                     <p class="mb-0">Moneda del documento<br />
                        <strong class="text-18">{{ $pago->pag_moneda_documento }}</strong>
                     </p>
                  </div>
                  <div class="col-sm-6 col-md-4">
                     <p class="mb-0">Forma de pago<br />
                        <strong class="text-18">{{ $pago->tipo->tip_nombre }}</strong>
                     </p>
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
                        <strong class="text-18">{{ $pago->pag_identificacion }}</strong>
                     </p>
                  </div>
                  <div class="col-sm-6 col-md-4">
                     <p class="mb-0">Razón social<br />
                        <strong class="text-18">{{ $pago->pag_razon_social }}</strong>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection

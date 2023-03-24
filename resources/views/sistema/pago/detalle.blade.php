@extends('layouts.sistema')
@section('title', 'Consulta visualización de pagos')
@section('content')
<div class="p-4">
    <div class="container-fluid">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
             <li class="breadcrumb-item">Usted está en </li>
             <li class="breadcrumb-item active" aria-current="page">Detalle de pagos</li>
          </ol>
       </nav>
    </div>
 </div>
   <div class="card mb-4">
      <div class="card-body">
         <div class="row mb-4">
            <div class="mb-3 mb-md-0 col-md-7">
               <h1 class="mb-0"><a class="h2" href="{{ route('pago.index') }}">
                     <i class="fa-solid fa-circle-arrow-left fa-fw"></i></a> Detalle factura
               </h1>
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
                  @if (!auth()->user()->hasRole('Proveedor'))
                     <div class="mb-3 col-sm-6 col-md-4">
                        <p class="mb-0">Referencia<br />
                           <strong class="text-18">{{ $pago->pag_referencia }}</strong>
                        </p>
                     </div>
                  @endif
                  <div class="mb-3 col-sm-6 col-md-4">
                     <p class="mb-0">Cuenta<br />
                        <strong class="text-18">{{ $pago->pag_cuenta }}</strong>
                     </p>
                  </div>
                  @if (!auth()->user()->hasRole('Proveedor'))
                     <div class="mb-3 col-sm-6 col-md-4">
                        <p class="mb-0">Importe en moneda doc.<br />
                           <strong class="text-18">{{ $pago->pag_importe_moneda }}</strong>
                        </p>
                     </div>
                  @endif
                  <div class="mb-3 col-sm-6 col-md-4">
                     <p class="mb-0">Fecha del documento<br />
                        <strong class="text-18">{{ $pago->pag_fecha_documento }}</strong>
                     </p>
                  </div>
                  @if (!auth()->user()->hasRole('Proveedor'))
                     <div class="mb-3 col-sm-6 col-md-4">
                        <p class="mb-0">Vencimiento neto<br />
                           <strong class="text-18">{{ $pago->pag_vencimiento_neto }}</strong>
                        </p>
                     </div>
                  @endif
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
         @if (!auth()->user()->hasRole('Proveedor'))
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
         @endif
      </div>
   </div>
@endsection

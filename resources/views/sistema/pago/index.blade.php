@extends('layouts.sistema')
@section('title', 'Consulta visualización de pagos')
@section('content')
<div class="p-4">
    <div class="container-fluid">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
             <li class="breadcrumb-item">Usted está en </li>
             <li class="breadcrumb-item active" aria-current="page">Pagos</li>
          </ol>
       </nav>
    </div>
 </div>
   <div class="card mb-4">
      <div class="card-body">
         <div class="row mb-4">
            <div class="mb-3 mb-lg-0 col-lg-6 align-self-center">
               <h1 class="mb-0">Consulta visualización de pagos</h1>
            </div>
            <div class="col-lg-6">
               <div class="row justify-content-md-end">
                  <div class="col-sm-6 col-md-3 pp">
                     <button class="btn btn btn-link text-nowrap btn-limpiar-filtro-pagos" style="width: 100%;">Limpiar filtro <i class="fa-light fa-circle-minus fa-fw"></i></button>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="mb-3 col-sm-6 col-md-4">
               <label for="inicio" class="form-label">Desde fecha</label>
               <input type="date" class="form-control" id="inicio" name="inicio" />
            </div>
            <div class="mb-3 col-sm-6 col-md-4">
               <label for="termino" class="form-label">Fecha término</label>
               <input type="date" class="form-control" id="termino" name="termino">
            </div>
            @if (!auth()->user()->hasRole('Proveedor'))
               <div class="mb-3 col-sm-6 col-md-4">
                  <label for="planta" class="form-label">Planta</label>
                  @if (auth()->user()->hasRole('Finanza'))
                     <div class="form-select">{{ $plantas->first()->pla_nombre }}</div>
                  @endif

                  @if (auth()->user()->hasRole(['Gerente', 'Tesorero']))
                     <select id="planta" name="planta" class="form-select" style="width:100%;">
                        <option value="">Todos</option>
                        @foreach ($plantas as $planta)
                           <option value="{{ $planta->pla_id }}">{{ $planta->pla_nombre }}</option>
                        @endforeach
                     </select>
                  @endif
               </div>
            @endif
         </div>
      </div>
   </div>
   <div class="card mb-3">
      <div class="card-body">
         <div class="row">
            <div class="mb-3 mb-md-0 col-md-7">
               <h1 class="mb-0">Detalle</h1>
            </div>
            <div class="col-md-5 mb-3 text-end">
               <a class="btn btn-success btn-download-excel waves-effect waves-float waves-light" data-base-url="{{ route('pago.download.excel') }}" href="{{ route('pago.download.excel') }}">Descargar Excel <i class="fas fa-file-excel fa-fw"></i></a>
            </div>
         </div>
         <div class="table-responsive bd-lr">
            <input type="hidden" id="rol" value="{{ auth()->user()->getRoleId() }}">
            <div id="container-datagrid" data-link="{{ route('pago.list') }}" data-link-show="{{ route('pago.show', ':id') }}"></div>
         </div>
      </div>
   </div>
@endsection
@section('js_personalizado')
   <script>
      const TIPO_PROVEEDOR = 3;
      const grid = document.getElementById('container-datagrid');
      let link = grid.getAttribute('data-link');

      const notProveedor = () => {
         const rol = document.querySelector('#rol').value;

         return !(rol == TIPO_PROVEEDOR);
      }

      $(document).ready(async function(e) {

         const items = new DevExpress.data.CustomStore({ // función para el origen de datos
            load: function() {
               return sendRequest(link);
            }
         });

         DevExpress.localization.locale(navigator.language);

         const dataGrid = $(grid).dxDataGrid({
            dataSource: items,
            columnAutoWidth: true,
            showBorders: true, // mostrar bordes de la tabla
            hoverStateEnabled: true, // color en la fila al pasar el mouse por encima
            columnHidingEnabled: true, // ocultar columnas si no alcanzan a desplegarse en la resolucion
            allowColumnReordering: true, // permite mover las columnas (cambiar de orden) al actualizar vuelve a la normalidad
            // rowAlternationEnabled: true, // fila de color intercalada
            wordWrapEnabled: true, // permite visualizar todo el texto en una columna (pasa la siguiente, como si hiciera enter)
            searchPanel: { // 1 panel para buscar palabras
               visible: true,
               width: 240,
               placeholder: 'Buscar...',
            },
            headerFilter: { // filtro para filtrar al seleccionar valores de la columna en la cabecera
               visible: true,
            },
            filterRow: { //lupita para buscar en columna
               visible: true,
               applyFilter: 'auto', // puede ser auto u onClick
               betweenStartText: 'Inicio',
               betweenEndText: 'Fin',
            },
            pager: { // paginador, cuantas filas se muestran
               allowedPageSizes: [10, 25, 50, 100],
               showInfo: true,
               showNavigationButtons: true,
               showPageSizeSelector: true,
               visible: 'auto',
            },
            paging: { // numero de filas a mostrar
               pageSize: 10,
            },
            columnChooser: { // escoger que columnas se muestran u ocultar al presionar un botón y seleccionar
               enabled: false,
               mode: 'select',
            },
            columns: [
               // filtro en cabecera para NUMERIC filterOperations:[ "=", "<>", "<", ">", "<=", ">=", "between" ],
               // filtro en cabecera para STRING filterOperations:[ "contains", "notcontains", "startswith", "endswith", "=", "<>" ],
               // filtro en cabecera para DATE filterOperations:[ "=", "<>", "<", ">", "<=", ">=", "between" ],
               // en caso de tener 2 o más filtros, para dejar uno por defecto se usa selectedFilterOperation: "between",
               {
                  dataField: 'id',
                  caption: 'Id',
                  dataType: 'number',
                  alignment: 'left',
                  sortIndex: 1, // al cargar, ordena por esta columna
               },
               {
                  dataField: 'referencia',
                  caption: 'Referencia',
                  // visible: notProveedor(),
                  dataType: 'number',
                  alignment: 'left',
                  filterOperations: ["contains"],
                  hidingPriority: 5, // prioridad para ocultar columna, 0 se oculta primero
               },
               {
                  dataField: 'cuenta',
                  caption: 'Cuenta',
                  visible: notProveedor(),
                  filterOperations: ["contains"],
                  hidingPriority: 4, // prioridad para ocultar columna, 0 se oculta primero
               },
               {
                  dataField: 'importe_moneda',
                  caption: 'Importe en moneda',
                  // visible: notProveedor(),
                  alignment: 'left',
                  filterOperations: ["contains"],
                  hidingPriority: 2, // prioridad para ocultar columna, 0 se oculta primero
               },
               {
                  dataField: 'fecha_documento',
                  caption: 'Fecha doc',
                  dataType: 'datetime',
                  format: "dd/MM/yyyy",
                  filterOperations: ["between"],
                  selectedFilterOperation: "between",
                  filterOperations: ["between"],
                  hidingPriority: 3, // prioridad para ocultar columna, 0 se oculta primero
               },
               {
                  dataField: 'vencimiento_neto',
                  caption: 'Vencimiento neto',
                  dataType: 'datetime',
                  format: "dd/MM/yyyy",
                  filterOperations: ["between"],
                  selectedFilterOperation: "between",
                  filterOperations: ["between"],
                  hidingPriority: 1, // prioridad para ocultar columna, 0 se oculta primero
               },
               {
                  dataField: 'moneda_documento',
                  caption: 'Moneda doc',
                  filterOperations: ["contains"],
                  hidingPriority: 1, // prioridad para ocultar columna, 0 se oculta primero
               },
               {
                  dataField: 'forma_pago',
                  caption: 'Forma de pago',
                  filterOperations: ["contains"],
                  hidingPriority: 2, // prioridad para ocultar columna, 0 se oculta primero
               },
               {
                  dataField: 'estado',
                  caption: 'Estado',
                  filterOperations: ["contains"],
                  hidingPriority: 2, // prioridad para ocultar columna, 0 se oculta primero
               },
               {
                  caption: 'Opciones',
                  filterOperations: ["contains"],
                  hidingPriority: 0, // prioridad para ocultar columna, 0 se oculta primero
                  cellTemplate(container, options) {

                     const url_show = $(grid).data('link-show').replace(':id', options.data.id);

                     const link_show = '<a href="' + url_show + '" title="Ver"><img src="/public/imagenes/sitio/i-ojo.svg" alt="Ver" width="14" height="16" /></a>';

                     return $(link_show);
                  },
               },
            ],
         }).dxDataGrid('instance');

         $('.btn-limpiar-filtro-pagos').on('click', function(e) {
            e.preventDefault();

            const inputs = document.querySelectorAll('#inicio, #termino, #planta');

            inputs.forEach(input => $(input).val('').change());
         });

         $('#inicio, #termino, #planta').on('change', function(e) {
            const botonExcel = document.querySelector('.btn-download-excel');
            const inicio = document.querySelector('#inicio').value;
            const termino = document.querySelector('#termino').value;
            const planta = document.querySelector('#planta')?.value ?? '';

            const url = grid.getAttribute('data-link');
            const params = new URLSearchParams({
               inicio,
               termino,
               planta
            });

            link = url + '?' + params;

            botonExcel.href = botonExcel.getAttribute('data-base-url') + '?' + params;

            dataGrid.refresh();
         });
      });
   </script>
@endsection

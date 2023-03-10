@extends('layouts.sistema')
@section('title', 'Consulta visualización de pagos')
@section('content')
   <div class="row">
      <div class="mb-3 mb-md-0 col-md-3 col-lg-2">
         <div class="card">
            <div class="card-body">
               <ul class="menu">
                  <li class="active"><a href="#"><i class="fa-regular fa-user fa-fw"></i> Usuarios</a></li>
                  <li><a href="#"><i class="fa-light fa-user-group fa-fw"></i> Proveedores</a></li>
               </ul>
            </div>
         </div>
      </div>
      <div class="col-md-9 col-lg-10">
         <div class="card mb-4">
            <div class="card-body">
               <div class="row">
                  <div class="mb-3 mb-sm-0 col-sm-7 align-self-center">
                     <h1 class="mb-0">Mantenedor de usuarios</h1>
                  </div>
                  <div class="col-sm-5 text-end">
                     <div class="pl" style="display:inline-block;"> <a class="btn btn-success text-nowrap" style="width: 100%;" href="{{ route('usuario.create') }}">Crear nuevo usuario <i class="fa-light fa-circle-plus fa-fw"></i></a> </div>
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
                  <div class="col-md-5 text-end"> <a class="btn btn-success waves-effect waves-float waves-light" href="{{ route('usuario.download.excel') }}">Descargar Excel <i class="fas fa-file-excel fa-fw"></i></a> </div>
               </div>
               <div class="table-responsive bd-lr">
                  <div id="container-datagrid" data-link="{{ route('usuario.list') }}" data-link-edit="{{ route('usuario.edit', ':id') }}" data-link-delete="{{ route('usuario.delete', ':id') }}"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection

@section('js_personalizado')
   <script>
      const grid = document.getElementById('container-datagrid');

      $(document).ready(async function(e) {

         const items = new DevExpress.data.CustomStore({ // función para el origen de datos
            load: function() {
               return sendRequest($(grid).data('link'));
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
                  visible: false,
                  sortIndex: 1, // al cargar, ordena por esta columna
                  sortOrder: "desc", // orden descendente
               },
               {
                  dataField: 'nombre',
                  caption: 'Nombre',
                  filterOperations: ["contains"],
                  hidingPriority: 2, // prioridad para ocultar columna, 0 se oculta primero
               },
               {
                  dataField: 'apellido',
                  caption: 'Apellido',
                  filterOperations: ["contains"],
                  hidingPriority: 2, // prioridad para ocultar columna, 0 se oculta primero
               },
               {
                  dataField: 'tipo_id',
                  caption: 'Tipo de usuario',
                  filterOperations: ["contains"],
                  lookup: {
                     dataSource: {
                        store: {
                           type: 'array',
                           data: [{
                                 id: 1,
                                 name: 'Finanza'
                              },
                              {
                                 id: 2,
                                 name: 'Tesorero'
                              },
                              {
                                 id: 3,
                                 name: 'Proveedor'
                              },
                              {
                                 id: 4,
                                 name: 'Gerente'
                              },
                              {
                                 id: 5,
                                 name: 'Administrador'
                              }
                           ],
                           key: "id"
                        },
                        pageSize: 10,
                        paginate: true
                     },
                     valueExpr: 'id',
                     displayExpr: 'name'
                  },
               },
               {
                  dataField: 'planta',
                  caption: 'Planta',
                  filterOperations: ["contains"],
                  hidingPriority: 2, // prioridad para ocultar columna, 0 se oculta primero
                  cellTemplate(container, options) {
                     console.log(options.data.planta);
                     if (options.data.planta) return $('<label>' + options.data.planta + '</label>');
                     if (!options.data.planta) return $('<label>- - -</label>');
                  },
               },
               {
                  dataField: 'estado',
                  caption: 'Estado',
                  filterOperations: ["contains"],
                  lookup: {
                     dataSource: {
                        store: {
                           type: 'array',
                           data: [{
                                 id: 0,
                                 name: 'Inactivo'
                              },
                              {
                                 id: 1,
                                 name: 'Activo'
                              }
                           ],
                           key: "id"
                        },
                        pageSize: 10,
                        paginate: true
                     },
                     valueExpr: 'id',
                     displayExpr: 'name'
                  },
               },
               {
                  caption: 'Opciones',
                  filterOperations: ["contains"],
                  hidingPriority: 0, // prioridad para ocultar columna, 0 se oculta primero
                  cellTemplate(container, options) {

                     const url_edit = $(grid).data('link-edit').replace(':id', options.data.id);
                     const url_delete = $(grid).data('link-delete').replace(':id', options.data.id);

                     const link_edit = '<a href="' + url_edit + '" class="text-success me-2" title="Editar"><i class="fa-light fa-pencil fa-fw"></i></a>';
                     const link_delete = '<a href="' + url_delete + '" class="text-danger eliminar delete-confirmation" title="Eliminar" data-message="este usuario"><i class="fa-regular fa-trash fa-fw pointer-event-none"></i></a>';

                     return $(link_edit + link_delete);
                  },
               },
            ],
         }).dxDataGrid('instance');
      });
   </script>
@endsection

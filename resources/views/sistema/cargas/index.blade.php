@extends('layouts.sistema')
@section('title', 'Carga masiva de información')

@section('content')
<div class="card mb-4">
  <div class="card-body">
    <div class="row">
      <div class="mb-3 mb-lg-0 col-lg-6 align-self-center">
        <h1 class="mb-0">Carga masiva de información</h1>
      </div>
      <div class="col-lg-6">
        <div class="row justify-content-md-end">
          <div class="mb-3 mb-md-0 col-sm-6 pl">
            <select id="planta_carga" name="planta_carga" style="width: 100%;">
              <option>Seleccione planta</option>
              <option></option>
            </select>
          </div>
          <div class="col-sm-6 col-md-3 bt">
            <button class="btn btn-success text-nowrap" style="width: 100%;"  data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Subir archivo masivo <img src="/public/imagenes/sitio/import.png" width="14" height="16" alt="subir" /></button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card-body collapse"  id="collapseExample">
    <div class=" ">
      <h2 class="h1">Subir archivo</h2>
      <div class="tex-center" >
        <label for="file_arch" class="text-file"> Subir certificado de calidad <img src="/public/imagenes/sitio/i-file.svg" alt="">
          <input id="file_arch" type="file" name="certificado_calidad" class="file-simple" accept=".pdf">
        </label>
      </div>
    </div>
  </div>
</div>
<div class="card mb-3">
  <div class="card-body">
    <div class="row">
      <div class="mb-3 mb-md-0 col-md-7">
        <h1 class="mb-0">Detalle de la carga masiva</h1>
      </div>
      <div class="col-md-5 mb-3 text-end"> <a class="btn btn-success waves-effect waves-float waves-light" href="{{ route('carga.download.excel') }}">Descargar Excel <i class="fas fa-file-excel fa-fw"></i></a> </div>
    </div>
    <div id="container-datagrid" data-link="{{ route('carga.list') }}" data-link-edit="{{ route('carga.edit', ':id') }}" data-link-delete="{{ route('carga.delete', ':id') }}"></div>
  </div>
</div>
@endsection

@section('js_personalizado')
<script src="{{ asset('js/jquery/select2-4.0.7/dist/js/select2-init.js') }}"></script>
<script src="{{ asset('js/jquery/select2-4.0.7/dist/js/select2.js') }}"></script>

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
                    caption: 'Archivo',
                    filterOperations: ["contains"],
                    hidingPriority: 2, // prioridad para ocultar columna, 0 se oculta primero
                },
                {
                    dataField: 'nombre',
                    caption: 'Fila',
                    filterOperations: ["contains"],
                    hidingPriority: 2, // prioridad para ocultar columna, 0 se oculta primero
                },
                {
                    dataField: 'fecha_carga',
                    caption: 'Fecha',
                    filterOperations: ["contains"],
                    hidingPriority: 2, // prioridad para ocultar columna, 0 se oculta primero
                },
                {
                    dataField: 'hora_carga',
                    caption: 'Hora',
                    filterOperations: ["contains"],
                    hidingPriority: 2, // prioridad para ocultar columna, 0 se oculta primero
                },
                {
                    dataField: 'usuario',
                    caption: 'Usuario',
                    filterOperations: ["contains"],
                    hidingPriority: 2, // prioridad para ocultar columna, 0 se oculta primero
                },
                {
                    caption: 'Opciones',
                    filterOperations: ["contains"],
                    hidingPriority: 0, // prioridad para ocultar columna, 0 se oculta primero
                    cellTemplate(container, options) {

                        const url_edit = $(grid).data('link-edit').replace(':id', options.data.id);
                        const url_delete = $(grid).data('link-delete').replace(':id', options.data.id);

                        const link_edit = '<a href="' + url_edit + '" class="text-success me-2" title="Editar"><i class="fa-light fa-pencil fa-fw"></i></a>';
                        const link_delete = '<a href="' + url_delete + '" class="text-danger eliminar delete-confirmation" title="Eliminar" data-message="el proveedor"><i class="fa-regular fa-trash fa-fw pointer-event-none"></i></a>';

                        return $(link_edit + link_delete);
                    },
                },
            ],
        }).dxDataGrid('instance');
    });
</script>
@endsection

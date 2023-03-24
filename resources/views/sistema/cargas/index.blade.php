@extends('layouts.sistema')
@section('title', 'Carga masiva de información')

@section('content')
<div class="p-4">
    <div class="container-fluid">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
             <li class="breadcrumb-item">Usted está en </li>
             <li class="breadcrumb-item active" aria-current="page">Carga masiva</li>
          </ol>
       </nav>
    </div>
 </div>
    <div class="card mb-4">
        <form action="{{ route('carga.importar') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 mb-lg-0 col-lg-6 align-self-center">
                        <h1 class="mb-0">Carga masiva de información</h1>
                    </div>
                    <div class="col-lg-6">
                        <div class="row justify-content-md-end">
                            <div class="mb-3 mb-md-0 col-sm-6 pl">
                                <select id="planta" name="planta" style="width: 100%;">
                                    <option value="">Seleccione planta</option>
                                    @foreach ($plantas as $planta)
                                        @continue($planta->pla_estado == 0)
                                        @php
                                            $selected = old('planta') == $planta->pla_id ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $planta->pla_id }}" {{ $selected }}>{{ $planta->pla_nombre }}</option>
                                    @endforeach
                                </select>
                                @error('planta')
                                    <span class="invalid-feedback badge alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 mb-md-0 col-sm-6 pl">
                                <input type="file" id="excel" name="excel" class="form-control" style="height: 44px" accept=".xlsx, .xls">
                                @error('excel')
                                    <span class="invalid-feedback badge alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-md-3 bt">
                                <button type="submit" class="btn btn-success text-nowrap" style="width: 100%;" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Subir archivo masivo <img src="/public/imagenes/sitio/import.png"
                                        width="14" height="16" alt="subir" /></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

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
                        dataField: 'fila',
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
                ],
            }).dxDataGrid('instance');
        });
    </script>
@endsection

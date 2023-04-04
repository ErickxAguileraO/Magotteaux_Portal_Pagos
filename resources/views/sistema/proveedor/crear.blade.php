@extends('layouts.sistema')
@section('title', 'Nuevo proveedor')
@section('js_personalizado')
    <script src="{{ asset('js/jquery/select2-4.0.7/dist/js/select2-init.js') }}"></script>
    <script src="{{ asset('js/jquery/select2-4.0.7/dist/js/select2.js') }}"></script>
@endsection
@section('content')
<div class="p-4">
    <div class="container-fluid">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
             <li class="breadcrumb-item">Usted está en </li>
             <li class="breadcrumb-item active" aria-current="page">Crear proveedor</li>
          </ol>
       </nav>
    </div>
 </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="mb-4">
                <h1 class="mb-0">Nuevo proveedor</h1>
            </div>
            <form method="POST" action="{{ route('proveedor.store') }}" onsubmit="myFunction()" class="formulario-crear-proveedor">
                @csrf
                @method('post')
                <div class="list-group mb-4">
                    <div class="list-group-item">
                        <div class="row">
                            <div class="mb-3 col-sm-6 col-md-4">
                                <label for="razon_social" class="form-label">Razón social</label>
                                <input tabindex="1" type="text" class="form-control" id="razon_social" name="razon_social" value="{{ old('razon_social') }}" />
                                @error('razon_social')
                                    <span class="invalid-feedback badge alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6 col-md-4">
                                <label for="pro_identificacion" class="form-label">Identificación (RUT, DNI, etc)</label>
                                <input tabindex="2" type="text" class="form-control" id="pro_identificacion" name="pro_identificacion">
                                @error('pro_identificacion')
                                    <span class="invalid-feedback badge alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6 col-md-4">
                                <label for="pais" class="form-label">País</label>
                                <select tabindex="3" id="pais" name="pais" class="form-select" style="width:100%;">
                                    <option value="">Seleccione país</option>
                                    @foreach ($paises as $paises)
                                        @continue($paises->pai_estado == 0)
                                        @php
                                            $selected = old('pais') == $paises->pai_id ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $paises->pai_id }}" {{ $selected }}>{{ $paises->pai_nombre }}</option>
                                    @endforeach
                                </select>
                                @error('pais')
                                    <span class="invalid-feedback badge alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- <div class="mb-3 col-sm-6 col-md-4">
                                <label for="email_uno" class="form-label">Email 1</label>
                                <input type="text" class="form-control" id="email_uno" name="email_uno" value="{{ old('email_uno') }}">
                                @error('email_uno')
                                    <span class="invalid-feedback badge alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            {{-- <div class="mb-3 col-sm-6 col-md-4">
                                <label for="email_dos" class="form-label">Email 2</label>
                                <input type="text" class="form-control" placeholder="Campo opcional" id="email_dos" name="email_dos" value="{{ old('email_dos') }}">
                                @error('email_dos')
                                    <span class="invalid-feedback badge alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            <div class="mb-3 col-sm-6 col-md-4">
                                <label for="telefono_contacto" class="form-label">Teléfono de contacto</label>
                                <input type="number" class="form-control" id="telefono_contacto" name="telefono_contacto" value="{{ old('telefono_contacto') }}">
                                @error('telefono_contacto')
                                    <span class="invalid-feedback badge alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6 col-md-4">
                                <label for="">Estado</label>
                                <select class="form-select" name="pro_estado" id="pro_estado">
                                    <option value="1" {{ old('pro_estado') == '1' ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ old('pro_estado') == '0' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                                @error('pro_estado')
                                    <span class="invalid-feedback badge alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-end">
                    <div class="mb-3 mb-sm-0 col-sm-6 pp">
                        <button type="button" class="btn btn-link text-nowrap" onclick="location.href = '{{ route('proveedor.index') }}'" style="width: 100%;">Cancelar <i class="fa-light fa-circle-xmark fa-fw"></i></button>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <button type="submit" id="btn" class="btn btn-success text-nowrap" style="width: 100%;">Guardar nuevo proveedor <i class="fa-light fa-floppy-disk fa-fw"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('extra-js')

<script>
    function myFunction() {
        document.getElementById("btn").disabled = true;
    }
</script>
@endpush

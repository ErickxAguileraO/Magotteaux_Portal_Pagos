@extends('layouts.sistema')
@section('title', 'Editar mi perfil')
@section('js_personalizado')
@endsection
@section('content')
<div class="p-4">
    <div class="container-fluid">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
             <li class="breadcrumb-item">Usted está en </li>
             <li class="breadcrumb-item active" aria-current="page">Editar mi perfil</li>
          </ol>
       </nav>
    </div>
 </div>
    <div class="card mb-4">
        <form method="POST" action="{{ route('cuenta.update') }}" class="formulario-cambios-contraseña">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="mb-4">
                    <h1 class="mb-0">Editar mi perfil</h1>
                </div>
                <div class="list-group mb-4">
                    <div class="list-group-item">
                        <div class="row">
                            <div class="mb-3 col-sm-6 col-md-4">
                                <label for="password_1" class="form-label">Contraseña actual</label>
                                <input tabindex="1" type="password" class="form-control" name="password_actual" id="id_password_actual" value="{{ old('password_actual') }}">
                                @error('password_actual')
                                    <span class="invalid-feedback badge alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6 col-md-4">
                                <label for="password_2" class="form-label">Contraseña nueva</label>
                                <input tabindex="2" type="text" class="form-control" name="password_nueva" id="id_password_nueva">
                                @error('password_nueva')
                                    <span class="invalid-feedback badge alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-sm-6 col-md-4">
                                <label for="password_3" class="form-label">Confirmar contraseña</label>
                                <input tabindex="3" type="text" class="form-control" name="password_nueva_confirmar" id="id_password_nueva_confirmar">
                                @error('password_nueva_confirmar')
                                    <span class="invalid-feedback badge alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-end">
                    @if (auth()->user()->hasRole('Administrador'))
                        <div class="mb-3 mb-sm-0 col-sm-6 pp">
                            <button type="button" class="btn btn-link text-nowrap" style="width: 100%;" onclick="location.href = '{{ route('usuario.index') }}'">Cancelar <i class="fa-light fa-circle-xmark fa-fw"></i></button>
                        </div>
                    @endif
                    @if (auth()->user()->hasRole('Tesorero'))
                        <div class="mb-3 mb-sm-0 col-sm-6 pp">
                            <button type="button" class="btn btn-link text-nowrap" style="width: 100%;" onclick="location.href = '{{ route('carga.index') }}'">Cancelar <i class="fa-light fa-circle-xmark fa-fw"></i></button>
                        </div>
                    @endif
                    @if (auth()->user()->hasRole('Proveedor'))
                        <div class="mb-3 mb-sm-0 col-sm-6 pp">
                            <button type="button" class="btn btn-link text-nowrap" style="width: 100%;" onclick="location.href = '{{ route('proveedor.index') }}'">Cancelar <i class="fa-light fa-circle-xmark fa-fw"></i></button>
                        </div>
                    @endif
                    @if (auth()->user()->hasRole('Gerente'))
                        <div class="mb-3 mb-sm-0 col-sm-6 pp">
                            <button type="button" class="btn btn-link text-nowrap" style="width: 100%;" onclick="location.href = '{{ route('pago.index') }}'">Cancelar <i class="fa-light fa-circle-xmark fa-fw"></i></button>
                        </div>
                    @endif
                    @if (auth()->user()->hasRole('Finanza'))
                        <div class="mb-3 mb-sm-0 col-sm-6 pp">
                            <button type="button" class="btn btn-link text-nowrap" style="width: 100%;" onclick="location.href = '{{ route('proveedor.index') }}'">Cancelar <i class="fa-light fa-circle-xmark fa-fw"></i></button>
                        </div>
                    @endif

                    <div class="col-sm-6 col-md-3">
                        <button type="submit" class="btn btn-success text-nowrap" style="width: 100%;">Guardar contraseña <i class="fa-light fa-floppy-disk fa-fw"></i></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@extends('layouts.sistema')
@section('title', 'Editar usuarios')
@section('content')
<div class="p-4">
    <div class="container-fluid">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
             <li class="breadcrumb-item">Usted está en </li>
             <li class="breadcrumb-item active" aria-current="page">Editar usuario</li>
          </ol>
       </nav>
    </div>
 </div>
   <div class="card mb-4">
      <div class="card-body">
         <form method="POST" action="{{ route('usuario.update', ['id' => $usuario->usu_id]) }}" class="formulario-crear-cliente">
            <div class="mb-4">
               <h1 class="mb-0">Editar usuario</h1>
            </div>
            <div class="list-group mb-4">
               <div class="list-group-item">
                  <div class="row">
                     <div class="mb-3 col-sm-6 col-md-4">
                        <label for="nombre" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $usuario->usu_nombre) }}" />
                        @error('nombre')
                           <span class="invalid-feedback badge alert-danger" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="mb-3 col-sm-6 col-md-4">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido', $usuario->usu_apellido) }}">
                        @error('apellido')
                           <span class="invalid-feedback badge alert-danger" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="mb-3 col-sm-6 col-md-4">
                        <label for="celular" class="form-label">Celular</label>
                        <input type="text" class="form-control" id="celular" name="celular" value="{{ old('celular', $usuario->usu_celular) }}">
                        @error('celular')
                           <span class="invalid-feedback badge alert-danger" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="mb-3 col-sm-6 col-md-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $usuario->usu_email) }}">
                        @error('email')
                           <span class="invalid-feedback badge alert-danger" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="mb-3 col-sm-6 col-md-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="contrasena" value="{{ old('contrasena') }}">
                        @error('contrasena')
                           <span class="invalid-feedback badge alert-danger" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="mb-3 col-sm-6 col-md-4">
                        <label for="identificacion" class="form-label">Identificación</label>
                        <input type="text" class="form-control" id="identificacion" name="identificacion" value="{{ old('identificacion', $usuario->usu_identificacion) }}">
                        @error('identificacion')
                           <span class="invalid-feedback badge alert-danger" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="mb-3 col-sm-6 col-md-4">
                        <label for="tipo" class="form-label">Tipo de usuario</label>
                        <select id="tipo" name="tipo" class="form-select" style="width:100%;">
                           @foreach ($roles as $rol)
                              @php
                                 $selected = old('tipo', $usuario->getRoleId()) == $rol->id ? 'selected' : '';
                              @endphp
                              <option value="{{ $rol->id }}" {{ $selected }}>{{ $rol->name }}</option>
                           @endforeach
                        </select>
                        @error('tipo')
                           <span class="invalid-feedback badge alert-danger" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                     @php
                        $class = old('tipo', $usuario->getRoleId()) == 1 ? '' : 'd-none';
                     @endphp
                     <div class="mb-3 col-sm-6 col-md-4 {{ $class }} content-planta">
                        <label for="planta" class="form-label">Planta</label>
                        <select id="planta" name="planta" class="form-select" style="width:100%;">
                           <option value="">Seleccione</option>
                           @foreach ($plantas as $planta)
                              @php
                                 $selected = old('planta', $usuario->usu_planta_id) == $planta->pla_id ? 'selected' : '';
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
                     @php
                        $class = old('tipo', $usuario->getRoleId()) == 3 ? '' : 'd-none';
                     @endphp
                     <div class="mb-3 col-sm-6 col-md-4 {{ $class }} content-proveedor">
                        <label for="proveedor" class="form-label">Proveedor</label>
                        <select id="proveedor" name="proveedor" class="form-select" style="width:100%;">
                           <option value="">Seleccione</option>
                           @foreach ($proveedores as $proveedor)
                              @php
                                 $selected = old('proveedor', $usuario->usu_proveedor_id) == $proveedor->pro_id ? 'selected' : '';
                              @endphp
                              <option value="{{ $proveedor->pro_id }}" {{ $selected }}>{{ $proveedor->pro_razon_social }}</option>
                           @endforeach
                        </select>
                        @error('proveedor')
                           <span class="invalid-feedback badge alert-danger" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                     </div>
                     <div class="mb-3 col-sm-6 col-md-4">
                        <label for="estado" class="form-label">Estado</label>
                        <select id="estado" name="estado" class="form-select" style="width:100%;">
                           <option value="1" {{ old('estado', $usuario->usu_estado) == '1' ? 'selected' : '' }}>Activo</option>
                           <option value="0" {{ old('estado', $usuario->usu_estado) == '0' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                        @error('estado')
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
                  <button type="button" class="btn btn-link text-nowrap" onclick="location.href='{{ route('usuario.index') }}'" style="width: 100%;">Cancelar <i class="fa-light fa-circle-xmark fa-fw"></i></button>
               </div>
               <div class="col-sm-6 col-md-3">
                  <button type="submit" class="btn btn-success text-nowrap" style="width: 100%;">Guardar nuevo usuario <i class="fa-light fa-floppy-disk fa-fw"></i></button>
               </div>
            </div>
            @csrf
         </form>
      </div>
   </div>
@endsection

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="author" content="Aeurus Ltda.">
   <title>@yield('title')</title>

   <!-- CSS -->
   <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">
   <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
   <link rel="stylesheet" type="text/css" href="{{ asset('js/jquery/bootstrap/css/bootstrap.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/hoja-estilos.css') }}">
   <!-- END: Custom CSS-->
   <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/css/sweetalert2.min.css') }}">
   <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.2.4/css/dx.light.css" />
   <link rel="stylesheet" type="text/css" href="{{ asset('plugins/devextreme/devextreme.css') }}" />
   <!-- favicon -->
   <link href="{{ asset('favicon.ico') }}" rel="shortcut icon" />
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body>
   <header class="p-4 bg-dark border-bottom">
      <div class="container-fluid">
         <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <figure class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none"> <img src="{{ asset('imagenes/template/logo-white.svg') }}" width="265" height="50" /> </figure>
            <ul class="nav col-12 col-lg-auto ms-lg-5 me-lg-auto mb-2 justify-content-center mb-md-0">
               <li class="text-white">Plataforma<br>
                  <span class="h5">Página actual</span>
               </li>
            </ul>
            <div class="dropdown text-end"> <a href="#" class="d-block nav-link text-white dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">{{ auth()->user()->usu_email }}</a>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="{{ route('usuario.index') }}"><img src="{{ asset('imagenes/sitio/pagos.png') }}" width="16" height="16" alt="Consulta de pagos" /> Consulta visualización de pagos</a></li>
                  <li><a class="dropdown-item" href="{{ route('web.logout') }}"><img src="{{ asset('imagenes/sitio/cerrar-sesion.png') }}" width="17" height="16" alt="Cerrar sesión" /> Cerrar sesión</a></li>
               </ul>
            </div>
         </div>
      </div>
   </header>

   <div class="p-4">
      <div class="container-fluid">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
               <li class="breadcrumb-item">Usted está en </li>
               <li class="breadcrumb-item active" aria-current="page">Control de carga</li>
            </ol>
         </nav>
      </div>
   </div>
   <div class="px-4">
      <div class="content-body">
         <!-- Dashboard Ecommerce Starts -->
         @yield('content')
         <!-- Dashboard Ecommerce ends -->
      </div>
   </div>

   @include('imports.notifications')

   <!-- JS -->
   <script src="{{ asset('js/jquery/bootstrap/bootstrap.js') }}"></script>
   <script src="{{ asset('js/jquery/3.6.0/jquery-3.6.0.min.js') }}"></script>
   <script src="{{ asset('js/jquery/bootstrap/bootstrap.bundle.min.js') }}"></script>

   <script src="{{ asset('plugins/sweetalert2/js/sweetalert2.min.js') }}"></script>
   <script src="{{ asset('plugins/devextreme/devextreme.js') }}"></script>
   <script src="{{ asset('plugins/devextreme/dx.messages.es.js') }}"></script>
   <script src="{{ asset('js/jquery/select2-4.0.7/dist/js/select2-init.js') }}"></script>
   <script src="{{ asset('js/jquery/select2-4.0.7/dist/js/select2.js') }}"></script>
   <script src="{{ asset('plugins/devextreme/devextreme.js') }}"></script>
   <script src="{{ asset('plugins/devextreme/dx.messages.es.js') }}"></script>
   <script src="{{ asset('js/web.js') }}"></script>
   @yield('js_personalizado')
</body>
<!-- END: Body-->

</html>

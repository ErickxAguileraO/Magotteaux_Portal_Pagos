<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Aeurus Ltda.">
<title>Plataforma Gasmar</title>
<!-- CSS -->
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,600;0,900;1,400;1,900&display=swap" rel="stylesheet">
<link href="{{ asset('public/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/css/login.css')}}" rel="stylesheet" type="text/css">
<!-- JS -->
<script src="{{asset('public/js/jquery/3.6.0/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('public/js/jquery/bootstrap/bootstrap.min.js')}}"></script>
<!-- favicon -->
<link href="{{asset('public/favicon.ico')}}" rel="shortcut icon" />
</head>
<body>
<div id="wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-5 last"> <img class="imagen" src="/public/imagenes/borrar/background-login.jpg" width="655" height="1024" />
        <figure class="logo"><img src="/public/imagenes/template/logo-blanco.png" width="326" height="96" alt="Gasmar"></figure>
      </div>
      <div class="col-sm">
        <div id="login">
          <figure id="logo-resp"> <img src="/public/imagenes/template/logo-azul.png" width="326" height="96" alt="Gasmar"> </figure>
          <form action="#" class="form-horizontal sesion" id="form-login" method="POST" role="form">
            <fieldset>
              <legend style="margin-bottom:40px;">POR FAVOR REVISE SU CORREO</legend>
              <p class="legend">Enviamos las instrucciones, para restablecer su contraseña a su correo electrónico. Siga los pasos descritos en el correo, para recuperar su cuenta.</p>
              
              
              <div class="text-center" style="padding-top: 10px;">
                <p class="text-center"><a href="/maqueta/login/">¿Recordó su contraseña?</a></p>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

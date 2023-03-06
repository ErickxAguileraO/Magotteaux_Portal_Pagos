<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Aeurus Ltda.">
<title>Plataforma Magotteaux</title>
<!-- CSS -->
   <link href="https://fonts.googleapis.com/css2?family=Hind:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('css/login.css')}}" rel="stylesheet" type="text/css">
<!-- JS -->
<script src="{{asset('js/jquery/3.6.0/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/jquery/bootstrap/bootstrap.min.js')}}"></script>
<!-- favicon -->
<link href="{{asset('favicon.ico')}}" rel="shortcut icon" />
</head>
<body>
<div id="wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm">
        <div id="login">
          
          <form action="#" class="form-horizontal sesion" id="form-login" method="POST" role="form">
            <fieldset>
              <legend style="margin-bottom:40px;">Revise su correo</legend>
              <p class="text-center" style="margin-bottom: 12px;">Enviamos las instrucciones para recuperar su cuenta</p>
              <div class="text-center" style="padding-top: 40%;">
                <p>¿No ha recibido el correo? <a style="color:#5E9B6D; font-weight:600;" href="/maqueta/login/recuperar/">Haga clic aquí para reenviar</a></p>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <div class="col-sm-6 last"> <img class="imagen" src="/public/imagenes/login/background-login.jpg" width="716" height="814" /> </div>
    </div>
  </div>
</div>
</body>
</html>

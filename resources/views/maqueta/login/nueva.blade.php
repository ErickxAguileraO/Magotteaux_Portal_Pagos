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
<link href="{{asset('css/login.css')}}" rel="stylesheet" type="text/css">
<!-- JS -->
<script src="{{asset('js/jquery/3.6.0/jquery-3.6.0.min.js')}}"></script>
<script>
  function mostrarContrasena() {
	 var tipo = document.getElementById("password");
	 if (tipo.type == "password") {
		tipo.type = "text";
		document.getElementById("mostrar-pass").innerHTML = 'Ocultar'
	 } else {
		tipo.type = "password";
		document.getElementById("mostrar-pass").innerHTML = 'Mostrar'
	 }
  }
</script>
<!-- favicon -->
<link href="{{asset('favicon.ico')}}" rel="shortcut icon" />
</head>
<body>
<div id="wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm">
        <div id="login">
          <form action="#" class="form-horizontal" id="form-login" method="POST" role="form">
            <fieldset>
              <legend style="margin-bottom: 14px;">Nueva contraseña</legend>
              <p class="text-center">Cree una nueva contraseña.<br>
                Esta debe ser diferente a contraseñas usadas anteriormente.</p>
              <div class="form-group">
                <label for="password_1">Nueva contraseña</label>
                <input type="password" name="password_1" id="password_1" placeholder="********" tabindex="1" class="form-control" />
                <p id="mostrar-pass" onclick="mostrarContrasena()">Mostrar</p>
                <div class="p_errores"> Contraseña de usuario incorrecto </div>
              </div>
              <div class="form-group">
                <label for="password_2">Confirmar contraseña</label>
                <input type="password" name="password_2" id="password_2" placeholder="********" tabindex="2" class="form-control" />
                <p id="mostrar-pass2" onclick="mostrarContrasena()">Mostrar</p>
                <div class="p_errores"> Contraseña de usuario incorrecto </div>
              </div>
              <div class="text-center" style="padding-top: 10px;">
                <button type="button" class="btn btn-primary" style="width: 100%; margin-bottom: 20px;">Iniciar sesión <img src="/public/imagenes/sitio/btn-login.svg" alt="" width="14" height="14"></button>
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

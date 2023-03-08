<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <style>
      @import url('https://fonts.googleapis.com/css2?family=Hind&display=swap');

      body {
         background: #F5F5F5;
         margin: 0px;
         font-family: 'Hind', sans-serif;
      }

      header {
         background: #002060;
         widows: 100%;
         height: 44px;
      }

      .img-correo {
         margin: 36px 0px 36px 0px;
      }

      .contenido {
         display: flex;
         align-items: center;
         flex-direction: column;
         width: 100%;
      }

      .txt {
         background: white;
         width: 80%;
         height: auto;
         border-radius: 10px;
         padding: 45px;
      }

      .link {
         color: #002060;
         font-weight: bold;
      }

      p {
         margin-bottom: 40px;
      }

      .hetigh {
         height: 40px;
      }
   </style>
</head>

<body>
   <header></header>
   <div class="contenido">
      <img class="img-correo" src="{{ asset('web/imagenes/i-logo-color.svg') }}" alt="">
      <div class="txt">
        <p>Asunto: Su contraseña ha sido cambiada</p>
         <p>Estimado: {{ $usuario->usu_nombre.' '.$usuario->usu_apellido }}</p>
         <p>
            Su contraseña ha sido cambiada: {{ $contrasena }}
         </p>
         <br>
            Saluda atte:
            <br>
            Magotteaux
         <p>
            Enlace plataforma: <a href="http://magotteaux.aeurus.cl/login" class="link">http://magotteaux.aeurus.cl/login</a>
         </p>
         <br>

      </div>
   </div>
</body>

</html>

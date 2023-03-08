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
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css">
    <!-- JS -->
    <script src="{{ asset('js/jquery/3.6.0/jquery-3.6.0.min.js') }}"></script>
    <!-- favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon" />
</head>

<body>
    <div id="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm">
                    <div id="login">
                        <form action="{{ route('web.store.password') }}" class="form-horizontal" id="form-login" method="POST" role="form">
                            @csrf
                            <fieldset>
                                <legend style="margin-bottom:14px;">Revise su correo</legend>
                                <p class="text-center" style="margin-bottom:40px;">Enviamos las instrucciones para recuperar su cuenta</p>
                                <div class="form-group">
                                    <label for="log_email">Email</label>
                                    <input type="email" name="email_recuperar" id="email_recuperar" required placeholder="john.doe@address.com" tabindex="1" class="form-control" />
                                    @error('email_recuperar')
                                        <span class="invalid-feedback badge alert-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="text-center" style="padding-top: 10px;">
                                    <button type="submit" class="btn btn-primary" style="width: 100%; margin-bottom: 50px;">Recuperar contraseña <img src="/public/imagenes/sitio/btn-login.svg" alt="" width="14" height="14" /></button>
                                    <p class="text-center"><a href="/maqueta/login/">Volver a Iniciar Sesión</a></p>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6 last"> <img class="imagen" src="/public/imagenes/login/background-login.jpg" width="716" height="814" /> </div>
            </div>
        </div>
    </div>
    @include('imports.notifications')
    <script src="{{ asset('web/plugins/sweetalert2/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('web/js/web.js') }}"></script>
</body>

</html>

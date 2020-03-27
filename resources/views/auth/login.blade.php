<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Iniciar Sesión</title>

    <!-- Bootstrap -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendor/font-awesome/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendor/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/vendor/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/css/custom.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    @include('adminlte-templates::common.errors')
    @include('flash::message')
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <h1>Inicio de Sesión</h1>
                <form method="post" action="{{ url('/login') }}">

                    {!! csrf_field() !!}
                    <div>
                        <input name="email" type="text" class="form-control" placeholder="Nombre de usuario" />
                    </div>
                    <div>
                        <input name="password" type="password" class="form-control" placeholder="Contraseña" />
                    </div>
                    <div>
                        <button type="submit" onclick="submit();" class="btn btn-default">Iniciar Sesión</button>
                    </div>
                </form>
                <div class="clearfix"></div>

                <div class="separator">

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h1><i class="fa fa-user-md"></i> Sistema de Interconsultas médicas</h1>
                        <p>©2018 Clínica Nuestra Señora del Rosario de San Nicolás</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
</body>
</html>
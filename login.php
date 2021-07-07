<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vidad - Salud</title>
    <!-- CSS && Normalize -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/auth_login.css">
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['user'])){
            if($_SESSION['rol'] == 3)       
                header("location:paciente.php");   
            else if($_SESSION['rol'] == 2)
                header("location:medico.php"); 
        }  
    ?>


    <div class="container">

        <div class="title">
            <div class="img-logo">
                <img src="img/logo_saludvida.png" alt="Logo Salud Vida" class="logo">
            </div>
            <!-- /.img-logo -->

            <div class="header-text">
                <h1 class="header-text__text-login">Iniciar sesión</h1>
                <h2 class="header-text__welcome">Bienvenido</h2>
            </div>
            <!-- /.header-text -->
        </div>
        <!-- /.title -->

        <!-- ===== Form ===== -->
        <div class="form-login" >
            <form class="form" action = "backend/auth_login.php" method = "POST">
                <input placeholder="Ingrese su cédula" class="input form__id" type="text" name="cedula" id="user">
                <input placeholder="Ingrese su contraseña" class="input form__password" type="password" name="password" id="password">
                <div class="form__forget-password">
                    <a href="recover_password.html" class="text-forget-password">¿Olvidó su contraseña?</a>
                </div>
                <!-- /.forget-password -->

                <input type="submit" value="Iniciar sesión">
            </form>
            <!-- /.form -->
        </div>
        <!-- /.form-login -->

    </div>
    <!-- /.container -->
</body>
</html>
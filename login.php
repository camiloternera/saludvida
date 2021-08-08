<?php
    session_start();
    if(isset($_SESSION['user'])){
        if($_SESSION['rol'] == 3)       
            header("location:paciente.php");   
        else if($_SESSION['rol'] == 2)
            header("location:medico.php"); 
        else if($_SESSION['rol'] == 1)
            header("location:../admin/index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salud - Vida</title>
    <!-- CSS && Normalize -->
    <link rel="stylesheet" href="css/normalize.css">    
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="logo">
            <div class="logo__img">
                <img src="img/logo_saludvida.png" alt="Logo Salud Vida" class="img">
            </div>
            <!-- /.img-logo -->

            <div class="logo__text">
                <h1 class="logo__text-login">Iniciar sesión</h1>
                <h2 class="logo__welcome">Bienvenido</h2>
            </div>
            <!-- /.header-text -->
        </div>
        <!-- /.logo -->

        <!-- ===== Form ===== -->
        <div class="form-login" >
            <form class="form" id="formLogin">
                <input placeholder="Ingrese su cédula" class="input form__id" type="text" name="cedula" id="user">
                <input placeholder="Ingrese su contraseña" class="input form__password" type="password" name="password" id="password">
                <div class="form__forget-password">
                    <a href="recover_password.php" class="form__text-forget-password">¿Olvidó su contraseña?</a>
                </div>
                <!-- /.forget-password -->
                <input type="submit" value="Iniciar sesión" class="form__login-btn">
            </form>
            <!-- /.form -->
        </div>
        <!-- /.form-login -->
    </div>
    <!-- /.container -->

    <!-- Script JavaScript -->
    <script src="js/auth_login.js"></script>
</body>
</html>
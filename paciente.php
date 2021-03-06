<?php
    include "backend/includes/checkSesion.php";
    include "backend/includes/permisos/permiso_paciente.php";

    // $query = consultarPacientes();
    // echo "<pre>";
    // var_dump($query);
    // echo "</pre>";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/paciente.css">
    <link rel="stylesheet" href="icons/fontawesome/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">

    <title>Salud - Vida</title>
</head>
<body>
    <!-- dashboard -->
    <div class="ContainerDashB">
        <!-- Parte de abajo -->
        <div class="DashFoot">
            <div class="DashFootItem">
                <img src="img/img-menu.svg" alt="">
            </div>
        </div>
        <!-- Parte de arriba -->
        <nav class="DashContent">
            <div class="DashLogo">
                <a href="#">
                    <i class="color-logo fas fa-plus"></i>
                    <span id="colorA">Salud</span><span id="colorC">Vida</span>
                </a>
            </div>
            <div class="DashBItem">
                <div class="icons">
                    <a href=""> <i class="fas fa-virus"></i></a>
                </div>
                <p>Información covid</p>
            </div>
            <div class="DashBItem">
                <div class="icons">
                    <a href=""> <i class="fas fa-calendar-alt"></i></a>
                </div>
                Citas médicas
            </div>
            <ul class="submenu__citas">
                <li class="submenu__cita-item"><a href="#">Solicitar cita</a></li>
                <li class="submenu__cita-item"><a href="#">Consultar y eleminar citas</a></li>
                <li class="submenu__cita-item"><a href="#">Historial de citas</a></li>

            </ul>


            <div class="DashBItem">
                <div class="icons">
                    <a href=""> <i class="far fa-clipboard"></i></i></a>
                </div>
                Información personal
            </div>
            <ul class="submenu__infoPersonal">
                <li class="submenu__infoPersonal-item"><a href="#">Carnet</a></li>
                <li class="submenu__infoPersonal-item"><a href="#">Opcion2</a></li>
            </ul>

            <div class="DashBItem">
                <div class="icons">
                    <a href=""> <i class="far fa-id-card"></i></i></a>
                </div>
                Actualiza tus datos
            </div>
        </nav>

    </div>


    <div class="mainContent">
        <!-- Se divide en dos piezas -->
        <div class="ContLeft">
            <div class="ContTop">
                <div class="ContToptxt">
                    <h2>Bienvenido a SaludVida!</h2>
                    <p>Estamos para servirle, estimado paciente</p>
                </div>

                <div class="ContTopImg">
                    <img src="img/medic.png" alt="">
                </div>
            </div>

            <div class="ContPrincipal">
                <p>
                    Salud Total EPS-S le brinda una cordial bienvenida a Oficina Virtual, una herramienta de fácil acceso con la que podrá
                    realizar con toda seguridad
                    y tranquilidad desde su casa o lugar de trabajo, los siguientes trámites:
                </p>
                <br>
                <ul>
                    <li>Actualización de datos del cotizantes y del grupo familiar.</li>
                    <li>Consultar las unidades de atención médica y odontológica asignadas.</li>

                </ul>


                </p>
            </div>

        </div>

        <div class="ContRight">
            <div class="Cerrarbtn">
                <div class="divBtnCerrar">
                    <a href="backend/cerrar_sesion.php">Cerrar sesión</a>
                </div>
            </div>

            <div class="ContPersonAside">
                <div class="divBtnPerson">
                    <input type="checkbox" id="btnMenu">

                    <label for="btnMenu" class="checkBtn">
                        <i class="far fa-user"></i>
                    </label>

                </div>
                <div class="divPersonInfo" id="personInfo">

                </div>


            </div>

        </div>


    </div>


    <script src="js/paciente.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/medico.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="icons/fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">

    <title>SaludVida</title>
</head>
<body>
    <?php
        include_once("../backend/includes/checkSesion.php");
        include_once("backend/includes/permiso_medico.php");
    ?>

    <!-- dashboard -->
    <div class="ContainerDashB">
        <!-- Parte de abajo -->
        <div class="DashFoot">
            <div class="DashFootItem">
                <img src="img/undraw_doctors_hwty.svg" alt="">
            </div>
        </div>
        <!-- Parte de arriba -->
        <div class="DashContent">
            
            <div class="DashLogo">
                <a href="#">
                    <i class="color-logo fas fa-plus"></i>
                    <span id="colorA">Salud</span><span id="colorC">Vida</span>
                </a>
            </div>

            <div class="DashBItem">
                <div class="icons">
                    <a href=""> <i class="fas fa-calendar-alt"></i></a>
                </div>
                <p>Consultar citas</p> 
            </div>
            <ul class="submenu__ConsulCitas">
                <li class="submenu__ConsulCitas-item"><a href="#">Ver cita</a></li>
                <li class="submenu__ConsulCitas-item"><a href="#">Historial de citas</a></li>
               
            </ul>
 
            <div class="DashBItem">
                <div class="icons">
                    <a href=""><i class="far fa-calendar-plus"></i></a>
                </div>
                <p>Agregar citas</p>
            </div>
            <ul class="submenu__citas">
                <li class="submenu__cita-item"><a href="#">Solicitar cita</a></li>               
            </ul>
         

            <div class="DashBItem">
                <div class="icons">
                    <a href=""> <i class="far fa-calendar-times"></i></a>
                </div>
                <p>Eliminar citas</p>
            </div>
            <ul class="submenu__infoPersonal">
                <li class="submenu__infoPersonal-item"><a href="#">Cancelar cita</a></li>      
            </ul>

            <div class="DashBItem">
                <div class="icons">
                    <a href=""> <i class="far fa-id-card"></i></a>
                </div>
                <p>Consultar pacientes</p>
            </div>
            <ul class="submenu__ConsulPacientes">
                <li class="submenu__ConsulPacientes-item"><a href="#">Buscar información</a></li>
                <li class="submenu__ConsulPacientes-item"><a href="#">Pacientes actuales</a></li>
                <li class="submenu__ConsulPacientes-item"><a href="#">Historial de pacientes</a></li>
               
            </ul>
            
            
        </div>

    </div>


    <div class="mainContent">
        <!-- Se divide en dos piezas -->
        <div class="ContLeft">
            <div class="ContTop">
                <div class="ContToptxt">
                    <h2>Bienvenido a SaludVida!</h2>
                    <p>Siempre listos para hacer un gran equipo</p>
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
                    <li>Consultar agenda.</li>

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
    
    
    <script src="js/medico.js"></script>
</body>
</html>
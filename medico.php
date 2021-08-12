<?php 
    include('includes\template\header_medico.php'); 
    require('backend\functions\crud_medico.php');
    
    $result = consultarMedico($_SESSION['user']);
    $medico = mysqli_fetch_assoc($result);
?>

    <div class="mainContent">
        <!-- Se divide en dos piezas -->
        <div class="ContLeft">
            <div class="ContTop">
                <div class="ContToptxt">
                    <h2>Bienvenido a SaludVida! <?php echo $medico["nombre"]; ?></h2>
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
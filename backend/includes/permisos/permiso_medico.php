<?php

    //pregunta si rol es distinto a medico
    if($_SESSION['rol'] != 2) {
        //si es igual a paciente lo redirige a paciente
        switch ($_SESSION['rol']) {
            case 1:
                header("Location: ../../../admin/index.php");
                break;
            
            case 3:
                header("Location: ../../../paciente.php");
        }
    }

?>

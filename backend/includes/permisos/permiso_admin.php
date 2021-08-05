<?php 

    if ($_SESSION['rol'] != 1) {
        switch ($_SESSION['rol']) {
            case 2:
                header("Location: ../../../medico.php");
                break;
            case 3:
                header("Location: ../../../paciente.php");
                break;
        }
    }

?>
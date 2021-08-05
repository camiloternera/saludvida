<?php 

    //pregunta si rol es distinto a paciente
    if ($_SESSION['rol'] != 3) {
        switch ($_SESSION['rol']) {
            case 1:
                header("Location: ../../../admin/index.php");
                break;
            case 2:
                header("Location: ../../../medico.php");
                break;
        }
    }   

?>

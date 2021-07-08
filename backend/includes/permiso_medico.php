<?php 

//pregunta si rol es distinto a medico
if($_SESSION['rol'] != 2)
    //si es igual a paciente lo redirige a paciente
    if($_SESSION['rol'] == 3)      
     header("location:paciente.php");   

?>

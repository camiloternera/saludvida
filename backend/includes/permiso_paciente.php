<?php 

//pregunta si rol es distinto a paciente
if($_SESSION['rol'] != 3)
    //si es igual a medico lo redirige al dashboard de medicos
    if($_SESSION['rol'] == 2)      
     header("location:medicos.php");   

?>

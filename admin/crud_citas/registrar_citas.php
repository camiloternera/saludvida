<?php 

    require "../../backend/includes/config/database.php";
    require "../../backend/functions/consultar_citas.php";

    $db = conectarDB();

    // Listar (Consultar) citas;
    $SQL_SELECT = consultarCitas(); 

?>

<form class="formulario">
    <div>
        <label for="cedulaPaciente">Cedula del paciente</label>
        <input type="text" name="cedulaPaciente" id="cedulaPaciente">
    </div>
    <div>
        
    </div>

</form>
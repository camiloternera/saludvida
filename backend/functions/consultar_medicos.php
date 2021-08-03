<?php

    // Obtener todos los medicos
    function consultarMedicos() {
        require_once "../../backend/includes/config/database.php";
        $db = conectarDB();
        try {
            return $SQL_SELECT = mysqli_query($db, " SELECT * FROM medicos");
        } catch (Exception $e) {
            echo "Error " . $e->getMessage(). "<br>";
            return false;
        }
    }
    // echo json_encode($_REQUEST);
    // Obtener el id de un medico
    function consultarMedico($id) {
        require_once "../../backend/includes/config/database.php";
        $db = conectarDB();
        try {
            return $SQL_SELECT = mysqli_query($db, "SELECT * FROM medicos WHERE cedula_medico = $id");
            var_dump($SQL_SELECT);
        } catch (Exception $e) {
            echo "Error " . $e->getMessage(). "<br>";
            return false;
        }
    }

?>
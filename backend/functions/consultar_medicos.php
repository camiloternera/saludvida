<?php 

    function consultarMedicos() {
        require "../../backend/includes/config/database.php";
        $db = conectarDB();
        try {
            return $SQL_SELECT = mysqli_query($db, " SELECT * FROM medicos");
        } catch (Exception $e) {
            echo "Error " . $e->getMessage(). "<br>";
            return false;
        }
    }

    

?>
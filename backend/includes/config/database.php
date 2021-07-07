<?php
    // Conexion a la base de datos
    function conectarDB() {
        $host = "localhost";
        $user = "root";
        $password = ""; 
        $database = "saludvida";

        $db = mysqli_connect($host, $user, $password, $database);
        if ($db) {
            echo "Connect succefully";
        } else {
            echo "Danger! not conection";
        }

        return $db;
    }

?>
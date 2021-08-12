<?php
    // Conexion a la base de datos
    function conectarDB() {
        $host = "localhost";
        $user = "root";
        $password = ""; 
        $database = "saludvida";
        
        
        $db = mysqli_connect($host, $user, $password, $database);  
        if (!$db) {
            echo "Error no se pudo conectar";
            exit;
        }

        return $db;
    }

?>
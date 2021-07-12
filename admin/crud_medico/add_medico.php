<?php

    require_once "../../backend/includes/config/database.php";
    
    
        
        $db = conectarDB();
        // Validar entradas de Datos
        $cedula = filter_var($cedula, FILTER_SANITIZE_NUMBER_INT);
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
        $ages = filter_var($ages, FILTER_SANITIZE_NUMBER_INT);
        $address = filter_var($address, FILTER_SANITIZE_STRING);
        $cellphone = filter_var($cellphone, FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $sex = filter_var($sex, FILTER_SANITIZE_STRING);
        $specialty = filter_var($specialty, FILTER_SANITIZE_STRING);
        $collegiate = filter_var($collegiate, FILTER_SANITIZE_NUMBER_INT);

        // Insertar datos a la base de datos
        $SQL_INSERT = " INSERT INTO medicos(cedula_medico, nombre, apellido, edad, direccion, telefono, correo, sexo, especialidad, n_colegiado) 
        VALUES (?,?,?,?,?,?,?,?,?,?)";
        echo $SQL_INSERT;
        try {
            $stmt = $db->prepare($SQL_INSERT);
            $stmt->bind_param("issisisssi", $cedula, $name, $lastname, $ages, $address, $cellphone, $email, $sex, $specialty, $collegiate);
            $stmt->execute();
                if ($stmt->affected_rows == 1) {
                $response = array(
                    'respuesta' => 'Ok',
                    'data' => array(
                        'cedula' => $cedula,
                        'name' => $name,
                        'lastname' => $lastname,
                        'ages' => $ages,
                        'address' => $address,
                        'cellphone' => $cellphone,
                        'email' => $email,
                        'sex' => $sex,
                        'specialty' => $specialty,
                        'collegiate' => $collegiate,
                    )
                );
            }
            $stmt->close();
            $db->close();
        } catch (Exception $e) {
            $response = array (
                'error' => $e->getMessage()
            );
        }
        echo json_encode($response);
        
?>
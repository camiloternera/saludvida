<?php
    // echo json_encode($_POST);

    $accion = (isset($_REQUEST['accion'])) ? $_REQUEST['accion'] : '';

    if ($accion == 'crear') {
        require_once "../../backend/includes/config/database.php";
        $db = conectarDB();
        // Validar entradas de Datos
        $cedula = filter_var($_POST['cedula_medico'], FILTER_SANITIZE_NUMBER_INT);
        $name = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $lastname = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
        $ages = filter_var($_POST['edad'], FILTER_SANITIZE_NUMBER_INT);
        $address = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
        $cellphone = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
        $sex = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);
        $specialty = filter_var($_POST['especialidad'], FILTER_SANITIZE_STRING);
        $collegiate = filter_var($_POST['n_colegiado'], FILTER_SANITIZE_NUMBER_INT);

        try {
            // Insertar datos a la base de datos
            $SQL_INSERT = " INSERT INTO medicos(cedula_medico, nombre, apellido, edad, direccion, telefono, correo, sexo, especialidad, n_colegiado) 
            VALUES (?,?,?,?,?,?,?,?,?,?)";
            // echo $SQL_INSERT;
            $stmt = $db->prepare($SQL_INSERT);
            $stmt->bind_param("issisisssi", $cedula, $name, $lastname, $ages, $address, $cellphone, $email, $sex, $specialty, $collegiate);
            $stmt->execute();
                if ($stmt->affected_rows == 1) {
                $response = array(
                    'respuesta' => 'Ok',
                    'data' => array(
                        'cedula_medico' => $cedula,
                        'nombre' => $name,
                        'apellido' => $lastname,
                        'edad' => $ages,
                        'direccion' => $address,
                        'telefono' => $cellphone,
                        'correo' => $email,
                        'sexo' => $sex,
                        'especialidad' => $specialty,
                        'n_colegiado' => $collegiate,
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
    }

    if ($accion == 'update') {
        // Llamado a la conexion a la base de datos
        require_once "../../backend/includes/config/database.php";
        $db = conectarDB();

        // Validar entradas de Datos
        $name = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $lastname = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
        $ages = filter_var($_POST['edad'], FILTER_SANITIZE_NUMBER_INT);
        $address = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
        $cellphone = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
        $sex = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);
        $specialty = filter_var($_POST['especialidad'], FILTER_SANITIZE_STRING);
        $collegiate = filter_var($_POST['n_colegiado'], FILTER_SANITIZE_NUMBER_INT);
        
        $cedula = filter_var($_POST['cedula_medico'], FILTER_SANITIZE_NUMBER_INT);

        try{
            $stmt = $db->prepare("UPDATE medicos SET nombre = ?, apellido = ?, edad = ?, direccion = ?, telefono = ?, correo = ?, sexo = ?, especialidad = ?, n_colegiado = ? WHERE cedula_medico = ?");
            $stmt->bind_param("ssisisssii", $name,  $lastname,  $ages, $address, $cellphone, $email, $sex, $specialty, $collegiate, $cedula);
            $stmt->execute();
            if($stmt->affected_rows == 1){
                $response = array(
                    'respuesta' => 'Ok',
                    'data' => array(
                        'cedula_medico' => $cedula,
                        'nombre' => $name,
                        'apellido' => $lastname,
                        'edad' => $ages,
                        'direccion' => $address,
                        'telefono' => $cellphone,
                        'correo' => $email,
                        'sexo' => $sex,
                        'especialidad' => $specialty,
                    )
                );
            } else {
                $response = array(
                    'respuesta' => 'error'
                );
            }
            $stmt->close();
            $db->close();
        } catch(Exception $e){
            $response = array(
                'error' => $e->getMessage()
            );
        }

       echo json_encode($response);
    }

    if ($accion == 'delete') {
        // Llamo la conexion a la base de datos
        require_once "../../backend/includes/config/database.php";
        $db = conectarDB();

        // Valido que la id sea del tipo de dato que deberia ser
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

        try {
            $stmt = $db->prepare("DELETE FROM medicos WHERE cedula_medico = ? ");
            // El parametro "i" indica que es entero https://www.php.net/manual/en/mysqli-stmt.bind-param
            $stmt->bind_param("i", $id);
            $stmt->execute();
            if($stmt->affected_rows == 1) {
                $response = array(
                     'respuesta' => 'Successful'
                );
           }
           $stmt->close();
           $db->close();
        } catch(Exception $e){
            $response = array(
                 'error' => $e->getMessage()
            );
       }
       
       echo json_encode($response);

    }
        
?>
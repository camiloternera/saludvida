<?php
    // echo json_encode($_POST);

    $registrar = (isset($_REQUEST['registrar'])) ? $_REQUEST['registrar'] : '';

    if ($registrar == 'crear') {
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
        
?>
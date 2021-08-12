<?php
    // define('__ROOT__', dirname(dirname(__FILE__)));
    require(dirname(dirname(__FILE__)).'\includes\config\database.php');
    $db = conectarDB();

    // Obtener todos los pacientes
    function consultarPacientes() {
        try {
            $db = conectarDB();
            $SQL_SELECT = mysqli_query($db, " SELECT * FROM pacientes");
            return $SQL_SELECT;
        } catch (Exception $e) {
            echo "Error " . $e->getMessage(). "<br>";
            return false;
        }
    }

    $accion = (isset($_REQUEST['accion'])) ? $_REQUEST['accion'] : '';

    if ($accion == 'crear') {
        // Validar entradas de Datos
        $cedula = filter_var($_POST['cedula_paciente'], FILTER_SANITIZE_NUMBER_INT);
        $name = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $lastname = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
        $ages = filter_var($_POST['edad'], FILTER_SANITIZE_NUMBER_INT);
        $address = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
        $cellphone = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
        $sex = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);

        try {
            // Insertar datos a la base de datos
            $SQL_INSERT = " INSERT INTO pacientes(cedula_paciente, nombre, apellido, edad, direccion, telefono, correo, sexo) 
            VALUES (?,?,?,?,?,?,?,?)";
            // echo $SQL_INSERT;
            $stmt = $db->prepare($SQL_INSERT);
            $stmt->bind_param("issisiss", $cedula, $name, $lastname, $ages, $address, $cellphone, $email, $sex);
            $stmt->execute();
                if ($stmt->affected_rows == 1) {
                $response = array(
                    'respuesta' => 'Ok',
                    'data' => array(
                        'cedula_paciente' => $cedula,
                        'nombre' => $name,
                        'apellido' => $lastname,
                        'edad' => $ages,
                        'direccion' => $address,
                        'telefono' => $cellphone,
                        'correo' => $email,
                        'sexo' => $sex,
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
        // Validar entradas de Datos
        $name = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $lastname = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
        $ages = filter_var($_POST['edad'], FILTER_SANITIZE_NUMBER_INT);
        $address = filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
        $cellphone = filter_var($_POST['telefono'], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
        $sex = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);
        
        $cedula = filter_var($_POST['cedula_paciente'], FILTER_SANITIZE_NUMBER_INT);

        try{
            $stmt = $db->prepare("UPDATE pacientes SET nombre = ?, apellido = ?, edad = ?, direccion = ?, telefono = ?, correo = ?, sexo = ? WHERE cedula_paciente = ?");
            $stmt->bind_param("ssisissi", $name,  $lastname,  $ages, $address, $cellphone, $email, $sex, $cedula);
            $stmt->execute();
            if($stmt->affected_rows == 1){
                $response = array(
                    'respuesta' => 'Ok',
                    'data' => array(
                        'cedula_paciente' => $cedula,
                        'nombre' => $name,
                        'apellido' => $lastname,
                        'edad' => $ages,
                        'direccion' => $address,
                        'telefono' => $cellphone,
                        'correo' => $email,
                        'sexo' => $sex,
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
        // Valido que la id sea del tipo de dato que deberia ser
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

        try {
            $stmt = $db->prepare("DELETE FROM pacientes WHERE cedula_paciente = ? ");
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

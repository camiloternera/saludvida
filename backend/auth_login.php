<?php 

    $cedula = $_POST['cedula'];
    $password = $_POST['password'];
    // Valida que los campos no se manden vacio por $_POST
    if(!empty($_POST['cedula']) && !empty($_POST['password'])){
        // Requiere la conexion a la base de datos
        require_once('includes/config/database.php');
        // Guarda la funcion de la conexion a la base de datos en una variable $db
        $db = conectarDB();
        try {
            // Guarda la consulta en una variable $query
            $query = "SELECT * FROM usuarios WHERE cedula_usuario = '$cedula' and password_user = '$password'" ;
            // Ejecuta la funcion mysqli_query(); realiza la consulta a la base de datos
            $resolve = mysqli_query($db , $query);
            // Guarda el numero de filas afectadas
            $rows = mysqli_num_rows($resolve);
            // Valida si existe al menos una fila afectada
            if($rows > 0){
                // Ejecuta la funcion mysqli_fetch_assoc(); que regresa un array asociativo
                $user = mysqli_fetch_assoc($resolve);
                // Inicia un inicio de sesion
                session_start();
                // Almacena valores de los datos obtenidos de la base datos en la variable global $_SESSION.
                $_SESSION['user'] = $user['cedula_usuario'];
                $_SESSION['rol'] = $user['id_rol'];
                // Valido el rol del usuario para redirigirlo a la pagina correspondiente
                switch ($_SESSION['rol']) {
                    case 1:
                        $response = array(
                            'url' => '../admin/index.php'
                        );
                        break;
                    case 2:
                        $response = array(
                            'url' => '../medico.php'
                        );
                        break;
                    case 3:
                        $response = array(
                            'url' => '../paciente.php'
                        );
                        break;
                }

            }else {
                $response = array(
                    'msg' => 'Cedula y/o contraseña incorrecta'
                );
            }
        } catch (Exception $e) {
            $response = array (
                'error' => $e->getMessage()
            );
        }
    }
    // Si el usuario no existe lo redirige a la pagina de login.php
    // else header("Location:../login.php");
    echo json_encode($response);

?>
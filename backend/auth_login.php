<?php 

    $cedula = $_POST['cedula'];
    $password = $_POST['password'];

    if(!empty($_POST['cedula']) && !empty($_POST['password'])){
        require_once('includes/config/database.php');
        $db = conectarDB();
        
        $query = "SELECT * FROM usuarios WHERE cedula_usuario = '$cedula' and password_user = '$password'" ;
        $resolve = mysqli_query($db , $query);
        $rows = mysqli_num_rows($resolve);
        if($rows > 0){
            $user = mysqli_fetch_array($resolve);
            session_start();
            $_SESSION['user'] = $_POST['cedula'];
            $_SESSION['rol'] = $user['id_rol'];

            if($user['id_rol'] == 3)       
                 header("location:../paciente.php");   
            else if($user['id_rol'] == 2)
                   header("location:../medico.php");            
        }
        else header("location:../login.php"); 

    }
    else header("location:../login.php");




?>
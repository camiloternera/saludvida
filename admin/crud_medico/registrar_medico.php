<?php 

    require "../../backend/includes/config/database.php";
    require "../../backend/functions/registrar_medico.php";

    $db = conectarDB();
    
    
    //Arreglo de errores
    $errores = [];

    // Cargue con los datos ya ingresado y que no vuelva a escribir lo mismo.
    $cedula = "";
    $name = "";
    $lastname = "";
    $ages = "";
    $address = "";
    $cellphone = "";
    $email = "";
    $sex = "";
    $specialty = "";
    $collegiate = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // var_dump($_POST);

        $cedula = $_POST['cedula'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $ages = $_POST['ages'];
        $address = $_POST['address'];
        $cellphone = $_POST['cellphone'];
        $email = $_POST['email'];
        $sex = $_POST['sex'];
        $specialty = $_POST['specialty'];
        $collegiate = $_POST['collegiate'];
        
        //Validar formulario
        if(!$cedula) {
            $errores[] = "Por favor digite su cedula";
        }
        if(!$name) {
            $errores[] = "Por favor digite su nombre";
        }
        if(!$lastname) {
            $errores[] = "Por favor digite sus apellidos";
        }
        if(!$ages) {
            $errores[] = "Por favor digite su edad";
        }
        if(!$address) {
            $errores[] = "Por favor digite su direccion";
        }
        if(!$cellphone) {
            $errores[] = "Por favor digite su numero de celular";
        }
        if(!$email) {
            $errores[] = "Por favor digite su correo electronico";
        }
        if(!$sex) {
            $errores[] = "Por favor digite su elija su sexo";
        }
        if(!$specialty) {
            $errores[] = "Por favor digite su elija su especialidad";
        }
        if(!$collegiate) {
            $errores[] = "Por favor digite su numero de colegiado";
        }

        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";

        // Revisar que el arreglo de errores este vacio dashboard
        /** isset() = revisa que la variable este creada. 
         *  empty() = revisa que un arreglo este vacio.
        */
        if (empty($errores)) {
            // Insertar datos a la base de datos
            $INSERT = registrarMedico($cedula, $name, $lastname, $ages, $address, $cellphone, $email, $sex, $specialty, $collegiate);
            // echo $query;

            // echo "<pre>";
            // var_dump($INSERT);
            // echo "</pre>";  

            $result = mysqli_query($db, $query);

            if ($result) {
                    echo "Insertado correctamente";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <!-- CSS & Normalize -->
    <link rel="stylesheet" href="../../frontend/css/admin.css">
    <link rel="stylesheet" href="../../frontend/css/normalize.css">
</head>
<body> 
    <?php foreach($errores as $error): ?>
    <div class="alert error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/admin/crud_medico/registrar_medico.php">
        <div>
            <label for="cedula">Cedula</label>
            <input type="text" name="cedula" id="cedula" value="<?php echo $cedula; ?>">
        </div>
        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>">
        </div>
        <div>
            <label for="lastname">Apellidos</label>
            <input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>">
        </div>
        <div>
            <label for="ages">Edad</label>
            <input type="number" name="ages" id="ages" value="<?php echo $ages; ?>">
        </div>
        <div>
            <label for="address">Direccion</label>
            <input type="text" name="address" id="address" value="<?php echo $address; ?>">
        </div>
        <div>
            <label for="cellphone">Numero de celular</label>
            <input type="number" name="cellphone" id="cellphone" value="<?php echo $cellphone; ?>">
        </div>
        <div>
            <label for="email">Correo</label>
            <input type="email" name="email" id="email" value="<?php echo $email; ?>">
        </div>
        <div>
            <label for="sex">Sexo</label>
            <input type="text" name="sex" id="sex" value="<?php echo $sex; ?>">
        </div>
        <div>
            <label for="specialty">Especialista</label>
            <input type="text" name="specialty" id="specialty" value="<?php echo $specialty; ?>">
        </div>
        <div>
            <label for="collegiate">Numero de colegiado</label>
            <input type="text" name="collegiate" id="collegiate" value="<?php echo $collegiate; ?>">
        </div>
        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
    <a href="../index.php">Regresar</a>
</body>
</html>
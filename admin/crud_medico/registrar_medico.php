<?php 

    require "../../backend/includes/config/database.php";
    require "../../backend/functions/consultar_medicos.php";

    $db = conectarDB();

    // Listar (Consultar) pacientes;
    $SQL_SELECT = consultarMedicos();
    $resultSelect = mysqli_query($db, $SQL_SELECT);   
    
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
            $SQL_INSERT = " INSERT INTO medicos(cedula_medico, nombre, apellido, edad, direccion, telefono, correo, sexo, especialidad, n_colegiado) 
            VALUES ('$cedula', '$name', '$lastname', '$ages', '$address', '$cellphone', '$email', '$sex', '$specialty', '$collegiate')";
            // echo $SQL_INSERT;

            // echo "<pre>";
            // var_dump($INSERT);
            // echo "</pre>";  

            $result = mysqli_query($db, $SQL_INSERT);

            if ($result) {
                echo "Insertado correctamente";
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
            }
        }
    }

?>
<head>
    <link rel="stylesheet" href="../../frontend/css/admin.css">
</head>
<button class="button" id="btnAddPaciente">Agregar +</button>
<table class="table">
    <thead class="table_head">
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Edades</th>
            <th>Direcciones</th>
            <th>Telefono</th>
            <th>Correos</th>
            <th>Sexo</th>
            <th>Especialidad</th>
            <th>Numero de colegiado</th>
        </tr>
    </thead>
    <tbody class="table__body">
        <?php while($row = mysqli_fetch_assoc($resultSelect)): ?>
            <tr>
                <td>
                    <?php echo $row['cedula_medico']; ?>
                </td>
                <td>
                    <?php echo $row['nombre']; ?>
                </td>
                <td>
                    <?php echo $row['apellido']; ?>
                </td>
                <td>
                    <?php echo $row['edad']; ?>
                </td>
                <td>
                    <?php echo $row['direccion']; ?>
                </td>
                <td>
                    <?php echo $row['telefono']; ?>
                </td>
                <td>
                    <?php echo $row['correo']; ?>
                </td>
                <td>
                    <?php echo $row['sexo']; ?>
                </td>
                <td>
                    <?php echo $row['especialidad']; ?>
                </td>
                <td>
                    <?php echo $row['n_colegiado']; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<div class="modal" id="modalAdd">
    <div class="modal__container">
        <div class="modal__close">
            <button class="close">X</button>
        </div>
        <?php
            /**  Recorro los errores que tiene la variable 
            *    En dado caso que tenga algun error */
            foreach($errores as $error): 
        ?>
            <div class="alert error">
                <?php echo $error; ?>
            </div>
        <?php 
            // Finalizo en foreach() 
            endforeach;
        ?>
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
                <select name="sex" id="sex">
                    <option value="">--- Select ---</option>
                    <?php ?>
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                </select>
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
    </div>
</div>

<a href="../index.php">Regresar</a>
<script src="../../frontend/js/admin_index.js" type="module"></script>

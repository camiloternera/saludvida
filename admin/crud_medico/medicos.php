<?php

    require "../../backend/includes/config/database.php";
    require "../../backend/functions/consultar_medicos.php";
    require "add_medico.php";

    $db = conectarDB();

    // Listar (Consultar) medico;
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

    var_dump($_SERVER['REQUEST_METHOD']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        var_dump($_POST);

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
        // if (empty($errores)) {
        //     echo addMedico($cedula, $name, $lastname, $ages, $address, $cellphone, $email, $sex, $specialty, $collegiate);
        // }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <!-- CSS & FONTAWESOME & NORMALIZE -->
    <link rel="stylesheet" href="../../frontend/css/normalize.css">
    <link rel="stylesheet" href="../../frontend/icons/fontawesome/css/all.css">
    <link rel="stylesheet" href="../../frontend/css/admin.css">

</head>
<body>

    <header class="site-header">
        <div class="logo">
            <a class="logo__text" href="/admin/index.php">
                <i class="logo__color fas fa-plus"></i>
                <span class="color-salud">Salud</span><span class="color-vida">Vida</span>
            </a>
        </div>
        <!-- /.logo -->

        <div class="admin">
            <h1 class="admin__title">Administracion</h1>
        </div>
        <!-- /.admin -->

        <div class="box-min-profile">
            <div class="profile"></div>
            <div class="close-session"></div>
        </div>
        <!-- /.box-min-profile -->

    </header>
    <!-- /.site-header -->

    <nav class="menu-navegation">
        <ul>
            <li class="items">
                <a class="item" href="">Pacientes</a>
                <ul>
                    <li class="sub-item">
                        <a href="registrar_paciente.php">Listas de pacientes</a>
                    </li>
                    <!-- /.sub-item -->
                </ul>
                <!-- /.sub-items -->
            </li>
            <!-- /.items  -->
            <li class="items">
                <a class="item" href="">Medicos</a>
                <ul>
                    <li class="sub-item">
                        <a href="medicos.php">Listas de medicos</a>
                    </li>
                    <!-- /.sub-item -->
                </ul>
                <!-- /.sub-items -->
            </li>
            <!-- /.items -->
            <li class="items">
                <a class="item" href="">Citas</a>
                <ul class="display">
                    <li class="sub-item">
                        <a href="">Listar citas de pacientes</a>
                    </li>
                    <!-- /.sub-item -->
                    <li class="sub-item">
                        <a href="">Listar citas de medicos</a>
                    </li>
                    <!-- /.sub-item -->
                    <li class="sub-item">
                        <a href="">Historial de citas</a>
                    </li>
                    <!-- /.sub-item -->
                </ul>
                <!-- /.sub-items -->
            </li>
            <!-- /.items -->
            <li class="items">
                <a class="item" href="">Usuarios</a>
                <ul>
                    <li class="sub-item">
                        <a href="">Listas de usuarios   </a>
                    </li>
                    <!-- /.sub-item -->
                </ul>
                <!-- /.sub-items -->
            </li>
            <!-- /.items -->
        </ul>
    </nav>
    <!-- /.menu-navegation -->

    <main class="wrapper" id="main">
        <div class="btnAdd">
            <button class="button" id="btnAddPaciente">Agregar +</button>
        </div>

        <div class="table">
            <table>
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
                    <!-- Los datos vienen desde ajax -->
                </tbody>
                <tfoot class="table__footer">
                    <tr>
                        <th>Listado de medicos</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- SubVentana de Agregar Medico -->
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
                <h3 class="text-add">Agregar Medico</h3>
                <form class="formAdd">
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
                        <input type="hidden" name="registrar" id="registrar" value="registrar">
                        <input type="submit" value="Registrar">
                    </div>
                </form>
            </div>
        </div>

        <!-- SubVentana de Actualizar/Eliminar Medico -->
        <div class="modal" id="modalAccion">
            <div class="modal__container">
                <div class="modal__close">
                    <button class="closeAccion close">X</button>
                </div>
                <div class="container">
                    <form class="formulario" method="POST" action="medicos.php">
                            <div>
                                <label for="cedula">Cedula</label>
                                <input type="text" name="cedula" id="cedula" value="<?php echo $cedula ?>">
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
                            <input type="submit" value="Modificar">
                        </div>
                        <div>
                            <input type="submit" value="Eliminar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Importamos los archivos .js de tipo module para import/export entre archivos  -->
    <script src="../../frontend/js/admin_index.js" type="module"></script>
</body>
</html>

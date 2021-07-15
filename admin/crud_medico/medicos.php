<?php
    require "../../backend/functions/consultar_medicos.php";
    $consulta = consultarMedicos();
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
    <!-- /.site-header -->

    <nav class="menu-navegation">
        <ul>
           <li class="items">
                <header class="site-header">
                    <div class="logo">
                        <a class="logo__text-site" href="/admin/index.php">
                            <i class="logo__color fas fa-plus"></i>
                            <span class="color-salud">Salud</span><span class="color-vida">Vida</span>
                        </a>
                    </div>
                    <!-- /.logo -->

                    <div class="admin">
                        
                    </div>
                    <!-- /.admin -->

                    <div class="box-min-profile">
                        <div class="profile"></div>
                        <div class="close-session"></div>
                    </div>
                    <!-- /.box-min-profile -->

                </header>
            </li>
            <li class="items">
                <a class="item" href="">Pacientes <i class="fas fa-sort-down"></i></a>
               
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
                <a class="item" href="">Medicos <i class="fas fa-sort-down"></i></a>
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
                <a class="item" href="">Citas <i class="fas fa-sort-down"></i></a>
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
                <a class="item" href="">Usuarios <i class="fas fa-sort-down"></i></a>
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

    <div class="MainContainer">
         <header class="cent-header">
                    <div class="logo">
                        <a class="logo__text-Cent" href="/admin/index.php">
                            <i class="fas fa-hammer"></i>
                            <spam class="Cent-admin__title">Administración</spam>
                        </a>
                    </div>
                    <!-- /.logo -->

                    <div class="admin">
                        
                    </div>
                    <!-- /.admin -->

                    <div class="box-min-profile">
                        <div class="profile"></div>
                        <div class="close-session"></div>
                    </div>
                    <!-- /.box-min-profile -->

                </header>   
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
                    <tbody class="table__body" id="rowMedico">
                        <?php while($row = mysqli_fetch_assoc($consulta)): ?>
                            <tr>
                                <td> <?php echo $row['cedula_medico']; ?> </td>
                                <td> <?php echo $row['nombre']; ?> </td>
                                <td> <?php echo $row['apellido']; ?> </td>
                                <td> <?php echo $row['edad']; ?> </td>
                                <td> <?php echo $row['direccion']; ?> </td>
                                <td> <?php echo $row['telefono']; ?> </td>
                                <td> <?php echo $row['correo']; ?> </td>
                                <td> <?php echo $row['sexo']; ?> </td>
                                <td> <?php echo $row['especialidad']; ?> </td>
                                <td> <?php echo $row['n_colegiado']; ?> </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot class="table__footer">
                        <tr>
                            <th colspan="10">Listado de medicos</th>
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
                    <h3 class="text-add">Agregar Medico</h3>
                    <form class="formAdd">
                        <div class="formAdd-item">
                            <label for="cedula">Cedula</label>
                            <input type="text" name="cedula" id="cedula">
                        </div>
                        <div class="formAdd-item">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="formAdd-item">
                            <label for="lastname">Apellidos</label>
                            <input type="text" name="lastname" id="lastname">
                        </div>
                        <div class="formAdd-item">
                            <label for="ages">Edad</label>
                            <input type="number" name="ages" id="ages">
                        </div>
                        <div class="formAdd-item">
                            <label for="address">Direccion</label>
                            <input type="text" name="address" id="address">
                        </div>
                        <div class="formAdd-item">
                            <label for="cellphone">Numero de celular</label>
                            <input type="number" name="cellphone" id="cellphone">
                        </div>
                        <div class="formAdd-item">
                            <label for="email">Correo</label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div class="formAdd-item">
                            <label for="sex">Sexo</label>
                            <select name="sex" id="sex">
                                <option value=""></option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                            </select>
                        </div>
                        <div class="formAdd-item">
                            <label for="specialty">Especialista</label>
                            <input type="text" name="specialty" id="specialty">
                        </div>
                        <div class="formAdd-item">
                            <label for="collegiate">Numero de colegiado</label>
                            <input type="text" name="collegiate" id="collegiate">
                        </div>
                        <div class="formAdd-item">
                            <input type="hidden" name="registrar" id="registrar" value="crear">
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
                                    <input type="text" name="cedula" id="cedula">
                                </div>
                                <div>
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" id="name">
                                </div>
                                <div>
                                    <label for="lastname">Apellidos</label>
                                    <input type="text" name="lastname" id="lastname">
                                </div>
                                <div>
                                    <label for="ages">Edad</label>
                                    <input type="number" name="ages" id="ages">
                                </div>
                                <div>
                                    <label for="address">Direccion</label>
                                    <input type="text" name="address" id="address">
                                </div>
                                <div>
                                    <label for="cellphone">Numero de celular</label>
                                    <input type="number" name="cellphone" id="cellphone">
                                </div>
                                <div>
                                    <label for="email">Correo</label>
                                    <input type="email" name="email" id="email">
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
                                    <input type="text" name="specialty" id="specialty">
                                </div>
                                <div>
                                    <label for="collegiate">Numero de colegiado</label>
                                    <input type="text" name="collegiate" id="collegiate">
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
    </div>
    

    <!-- Importamos los archivos .js de tipo module para import/export entre archivos  -->
    <script src="../../frontend/js/admin_index.js" type="module"></script>
</body>
</html>

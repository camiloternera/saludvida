<?php
require_once "../backend/functions/crud_medico.php";

// // Verificar los datos de la base de datos.
// echo "<pre>";
// var_dump($row['cedula_medico']);
//     $row = mysqli_fetch_assoc($consulta);
// echo "</pre>";
?>

<?php include "includes/header.php"; ?>

        <main class="wrapper" id="main">    
            <div class="header-tools">
                <div class="tools">
                    <ul>
                        <li class="checkbox">
                            <span><input type="checkbox"></span>
                        </li>
                        <li>
                            <button id="updateMedico">
                                <i class="fas fa-pen"></i>
                            </button>
                        </li>
                        <li>
                            <button id="deleteMedico">
                                <i class="fas fa-trash"></i>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="btnAdd">
                    <button class="button" id="addMedico">Agregar +</button>
                </div>
            </div>

            <div class="table">
                <table>
                    <thead class="table__head">
                        <tr>
                            <th></th>
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
                        <!-- Leer medicos -> admin_medico.js -->
                        <?php $SQL_SELECT = consultarMedicos();
                            while ($row = mysqli_fetch_assoc($SQL_SELECT)) : ?>
                                <tr class="userSelect">
                                    <th><input type="checkbox" class="check" id="<?php echo $row['cedula_medico']; ?>"></th>
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
            <div class="modal" id="modal">        
                <div class="modal__container">
                    <div class="modal__close">
                        <div class="text-add">
                            <h3>Agregar Medico</h3>
                        </div>
                        <div>
                            <button class="close" type="click">X</button>
                        </div>
                    </div>
                    <form class="form">
                        <div class="form-item">
                            <label for="cedula">Cedula</label>
                            <input type="text" name="cedula" id="cedula">
                        </div>
                        <div class="form-item">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="form-item">
                            <label for="lastname">Apellidos</label>
                            <input type="text" name="lastname" id="lastname">
                        </div>
                        <div class="form-item">
                            <label for="ages">Edad</label>
                            <input type="number" name="ages" id="ages">
                        </div>
                        <div class="form-item">
                            <label for="address">Direccion</label>
                            <input type="text" name="address" id="address">
                        </div>
                        <div class="form-item">
                            <label for="cellphone">Numero de celular</label>
                            <input type="number" name="cellphone" id="cellphone">
                        </div>
                        <div class="form-item">
                            <label for="email">Correo</label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div class="form-item">
                            <label for="sex">Sexo</label>
                            <select name="sex" id="sex">
                                <option value="-- Selecciona una opción --"></option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
                        </div>
                        <div class="form-item">
                            <label for="specialty">Especialista</label>
                            <input type="text" name="specialty" id="specialty">
                        </div>
                        <div class="form-item">
                            <label for="collegiate">Numero de colegiado</label>
                            <input type="text" name="collegiate" id="collegiate">
                        </div>
                        <div class="form-item">
                            <input type="hidden" id="accion">
                            <input type="submit" value="Registrar">
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    
    <script src="js/admin_index.js"></script>
    <script src="js/admin_medico.js"></script>
</body>

</html>

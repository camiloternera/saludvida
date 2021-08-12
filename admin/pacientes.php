<?php 
    // define('__ROOT__', dirname(dirname(__FILE__)));
    require(dirname(dirname(__FILE__)).'\backend\functions\crud_paciente.php');
    include('includes/header.php');
?>
        <main class="wrapper" id="main">    
            <div class="header-tools">
                <div class="tools">
                    <ul>
                        <li class="checkbox">
                            <span><input id="allCheck" type="checkbox"></span>
                        </li>
                        <li>
                            <button id="updatePaciente">
                                <i class="fas fa-pen"></i>
                            </button>
                        </li>
                        <li>
                            <button id="deletePaciente">
                                <i class="fas fa-trash"></i>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="btnAdd">
                    <button class="button" id="addPaciente">Agregar +</button>
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
                        </tr>
                    </thead>
                    <tbody class="table__body" id="rowPaciente">
                        <!-- Leer pacientes -> admin_paciente.js -->
                        <?php $SQL_SELECT = consultarPacientes();
                            while ($row = mysqli_fetch_assoc($SQL_SELECT)) : ?>
                                <tr class="userSelect">
                                    <th><input type="checkbox" class="check" id="<?php echo $row['cedula_paciente']; ?>"></th>
                                    <td> <?php echo $row['cedula_paciente']; ?> </td>
                                    <td> <?php echo $row['nombre']; ?> </td>
                                    <td> <?php echo $row['apellido']; ?> </td>
                                    <td> <?php echo $row['edad']; ?> </td>
                                    <td> <?php echo $row['direccion']; ?> </td>
                                    <td> <?php echo $row['telefono']; ?> </td>
                                    <td> <?php echo $row['correo']; ?> </td>
                                    <td> <?php echo $row['sexo']; ?> </td>
                                </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot class="table__footer">
                        <tr>
                            <th colspan="10" style="text-align: center;">Listado de pacientes</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- SubVentana de Agregar Paciente -->
            <div class="modal" id="modal">        
                <div class="modal__container">
                    <div class="modal__close">
                        <div class="text-add">
                            <h3>Agregar Paciente</h3>
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
                                <option selected disabled>-- Selecciona una opción --</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                            </select>
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
    <script src="js/admin_paciente.js"></script>
</body>

</html>
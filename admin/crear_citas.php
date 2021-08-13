<?php
    require(dirname(dirname(__FILE__)).'\backend\functions\crud_citas.php');
    include('includes\template\header.php');
?>
        <main class="wrapper" id="main">    
            <div class="header-tools">
                <div class="tools">
                    <ul>
                        <li class="checkbox">
                            <span><input id="allCheck" type="checkbox"></span>
                        </li>
                        <li>
                            <button id="updateCitas">
                                <i class="fas fa-pen"></i>
                            </button>
                        </li>
                        <li>
                            <button id="deleteCitas">
                                <i class="fas fa-trash"></i>
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="btnAdd">
                    <button class="button" id="addCitas">Agregar +</button>
                </div>
            </div>

            <div class="table">
                <table>
                    <thead class="table__head">
                        <tr>
                            <th></th>
                            <th>Codico</th>
                            <th>Pacientes</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Medicos</th>
                            <th>Motivo</th> 
                        </tr>
                    </thead>
                    <tbody class="table__body" id="rowMedico">
                        <!-- Leer citas -> admin_crear-citas.js -->
                        <?php $result = consultarCitas();
                            while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr class="userSelect">
                                    <th><input type="checkbox" class="check" id="<?php echo $row['codigo_cita']; ?>"></th>
                                    <td> <?php echo $row['codigo_cita']; ?> </td>
                                    <td> <?php echo $row['cedula_paciente']; ?> </td>
                                    <td> <?php echo $row['fecha']; ?> </td>
                                    <td> <?php echo $row['hora']; ?> </td>
                                    <td> <?php echo $row['cedula_medico']; ?> </td>
                                    <td> <?php echo $row['motivo']; ?> </td>
                                </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot class="table__footer">
                        <tr>
                            <th colspan="10" style="text-align: center;">Listado de citas pendientes</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- SubVentana de Agregar Medico -->
            <div class="modal" id="modal">        
                <div class="modal__container">
                    <div class="modal__close">
                        <div class="text-add">
                            <h3>Agregar Cita</h3>
                        </div>
                        <div>
                            <button class="close" type="click">X</button>
                        </div>
                    </div>
                    <!-- /.modal__close -->
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
                            <input type="hidden" id="accion">
                            <input type="submit" value="Registrar">
                        </div>
                    </form>
                    <!-- /.form -->
                </div>
                <!-- /.modal__container -->
            </div>
            <!-- /.modal -->
        </main>
        <!-- /.wrapper -->
    </div>
    <!-- Script JavaScript -->
    <script src="js/admin_index.js"></script>
    <script src="js/admin_crear-citas.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <!-- CSS & FONTAWESOME & NORMALIZE -->
    <link rel="stylesheet" href="../frontend/css/normalize.css">
    <link rel="stylesheet" href="../frontend/icons/fontawesome/css/all.css">
    <link rel="stylesheet" href="../frontend/css/admin.css">

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
                        <a href="crud_paciente/registrar_paciente.php">Listas de pacientes</a>
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
                        <a href="crud_medico/medicos.php">Listas de medicos</a>
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
        <a href="crud_citas/registrar_citas.php">Registrar citas</a>
        <a href="#/registrar_medico">Registrar medicos</a>
        <a href=""></a>
        <a href=""></a>
    </nav>
    <!-- /.menu-navegation -->

    <main class="wrapper" id="main">
        <p> Hello </p>
    </main>

    <!-- Importamos los archivos .js de tipo module para import/export entre archivos  -->
    <script src="../frontend/js/admin_index.js" type="module"></script>
</body>
</html>
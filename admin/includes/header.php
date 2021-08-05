<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <!-- CSS & FONTAWESOME & NORMALIZE -->
    <link rel="stylesheet" href="../frontend/css/normalize.css">
    <link rel="stylesheet" href="../frontend/icons/fontawesome/css/all.css">
    <link rel="stylesheet" href="css/admin.css">

</head>

<body>
    <div class="container-lateral-left">
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
        <!-- /.site-header -->
        <nav class="menu-navegation">
            <ul>
                <li class="items">
                    <div class="list-items">
                        <p class="item">Pacientes</p>
                        <span><i class="fas fa-caret-right list__arrow"></i></span>
                    </div>
                    <ul class="list__show">
                        <a href="pacientes.php">
                            <li class="sub-item">Listas de pacientes</li>
                            <!-- /.sub-item -->
                        </a> 
                    </ul>
                    <!-- /.sub-items -->
                </li>
                <!-- /.items  -->
                <li class="items">
                    <div class="list-items">
                        <p class="item">Medicos</p>
                        <span><i class="fas fa-caret-right list__arrow"></i></span>
                    </div>
                    <ul class="list__show">
                        <a href="medicos.php">
                            <li class="sub-item">Listas de medicos</li>
                            <!-- /.sub-item -->
                        </a>
                    </ul>
                    <!-- /.sub-items -->
                </li>
                <!-- /.items -->
                <li class="items">
                    <div class="list-items">
                        <p class="item">Citas</p>
                        <span><i class="fas fa-caret-right list__arrow"></i></span>
                    </div>
                    <ul class="list__show">
                        <a href="">
                            <li class="sub-item">Listar citas de pacientes</li>
                            <!-- /.sub-item -->
                        </a>
                        <a href="">
                            <li class="sub-item">Listar citas de medicos</li>
                            <!-- /.sub-item -->
                        </a>
                        <a href="">
                            <li class="sub-item">Historial de citas</li>
                            <!-- /.sub-item -->
                        </a>
                    </ul>
                    <!-- /.sub-items -->
                </li>
                <!-- /.items -->
                <li class="items">
                    <div class="list-items">
                        <p class="item">Usuarios</p>
                        <span><i class="fas fa-caret-right list__arrow"></i></span>
                    </div>
                    <ul class="list__show">
                        <a href="">
                            <li class="sub-item">Listas de usuarios</li>
                            <!-- /.sub-item --> 
                        </a>
                    </ul>
                    <!-- /.sub-items -->
                </li>
                <!-- /.items -->

            </ul>
        </nav>
        <!-- /.menu-navegation -->
    </div>

    <div class="main-container">
        <header class="title-header">
            <div class="logo">
                <a class="logo__text-cent" href="/admin/index.php">
                    <i class="fas fa-hammer"></i>
                    <span class="cent-admin__title">Administración</span>
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
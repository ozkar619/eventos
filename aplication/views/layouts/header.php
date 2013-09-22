
<?php include $_SERVER['DOCUMENT_ROOT'] . '/eventos/aplication/config.ini.php'; ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Eventos Itcelaya</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="../bootstrap/css/aplication.css" rel="stylesheet">
        <script src="../bootstrap/js/jquery.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../bootstrap/js/inicio.js"></script>

    </head>
    <body>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">

                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="#">
                        <img src="<?php echo BASEURL; ?>views/images/logo_tecno.png" width="20" alt="logo" />  
                        Eventos
                    </a>

                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="<?php echo BASEURL; ?>views/site/inicio.php">Inicio</a></li>
                            <?php if (!isset($_SESSION['nombre'])): ?> 
                                <li><a href="<?php echo BASEURL; ?>views/site/registro.php">Registrate</a></li>
                            <?php endif; ?>
                            <li><a href="#contact">Contacto</a></li>

                            <?php if (isset($_SESSION['admin'])): ?>               
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrar<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <!--<li><a href="<?php echo BASEURL; ?>views/admin/adminConfig.php">Cuenta</a></li>-->
                                        <li><a href="<?php echo BASEURL; ?>views/admin/Eventos.php">Eventos</a></li>
                                        <li class="divider"></li>
                                        <li class="nav-header">Equipo</li>
                                        <li><a href="<?php echo BASEURL; ?>views/admin/staff.php">STAFF</a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['superadmin'])): ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">SuperAdmin<b class="caret"></b></a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="#">Usuarios</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a tabindex="-1" href="<?php echo BASEURL; ?>views/superadmin/usuariossuperadmin.php">Lista de Usuarios</a>
                                                </li>
                                                <li>
                                                    <a tabindex="-1" href="<?php echo BASEURL; ?>views/superadmin/registroTiposUsuario.php">Registrar Tipos de Usuario</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="#">Eventos</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a tabindex="-1" href="<?php echo BASEURL; ?>views/superadmin/registroEventos.php">Registrar Evento</a>
                                                </li>
                                                <li>
                                                    <a tabindex="-1" href="<?php echo BASEURL; ?>views/superadmin/eventossuperadmin.php">Lista de Eventos</a>
                                                </li>
                                                <li>
                                                    <a tabindex="-1" href="<?php echo BASEURL; ?>views/superadmin/adminssuperadmin.php">Administradores</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="#">Actividades</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a tabindex="-1" href="<?php echo BASEURL; ?>views/superadmin/registroTiposActividad.php">Registrar Tipos de Actividad</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <?php if (!isset($_SESSION['nombre'])): ?>  
                            <div class="navbar-form pull-right">
                                <a class="btn btn-small btn-primary" 
                                   href="<?php echo BASEURL; ?>views/site/login.php">
                                    Iniciar Sesion
                                </a>
                            </div> 
                        <?php else: ?>

                            <div class="navbar-form pull-right">

                                <div class="nav-collapse collapse">
                                    <ul class="nav">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['email'] ?><b class="caret"></b></a>
                                            <ul class="dropdown-menu">

                                                <li><a href="#">Mis eventos</a></li>
                                                <li><a href="#">Cambiar Password</a></li>
                                                <li class="divider"></li>

                                                <li><a href="<?php echo BASEURL; ?>views/site/cerrarSesion.php">Cerrar Sesion</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>    


                            </div> 

                        <?php endif;
                        ?>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container" id="page">


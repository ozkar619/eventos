<html lang="es">

    <head>

        <title>Eventos | ITC</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

         <!-- Bootstrap -->
        <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="../../bootstrap/css/app.css" rel="stylesheet">
        <script src="../../bootstrap/js/jquery.js"></script>
        <script src="../../bootstrap/js/bootstrap.min.js"></script>

    </head>

    <body>

        <div class="container">            

            <div class="span12">
                <div class="navbar">
                    <div class="navbar-inner">
                        <a class="brand" href="#">Panel de Administracion de Eventos</a>
                        <ul class="nav pull-right">
                            <li><a href="#">Cerrar Sesión <i class="icon-user"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="span12 row-fluid">
                <div class="span3">
                    <ul class="nav nav-tabs nav-stacked">
                        <li class="active"><a href="#">Actividades</a></li>
                        <li><a href="./index.php">Inicio</a></li>
                        <li><a href="./eventos.php">Eventos</a></li>
                        <li><a href="./configuracion.php">Configuracion</a></li>
                        <li><a href="#">Mas Opciones</a></li>
                    </ul>
                </div>                



                <div class="span9">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>id Actividad</th>
                                <th>Nombre Actividad</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Costo</th>                                
                                <th>Admin</th>
                            </tr>
                        </thead>
                        <tbody>                            
                            <tr>
                                <td>1</td>
                                <td>Actividad 1</td>
                                <td>26-07-2013</td>
                                <td>31-07-2014</td>
                                <td>0</td>
                                <td><center><button class="btn  btn-inverse" type="button"><i class="icon-edit icon-white"></i></button></center></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Actividad 2</td>
                                <td>26-07-2013</td>
                                <td>31-07-2014</td>
                                <td>0</td>
                                <td><center><button class="btn  btn-inverse" type="button"><i class="icon-edit icon-white"></i></button></center></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Actividad 3</td>
                                <td>26-07-2013</td>
                                <td>31-07-2014</td>
                                <td>0</td>
                                <td><center><button class="btn  btn-inverse" type="button"><i class="icon-edit icon-white"></i></button></center></td>
                            </tr>                            
                        </tbody>
                    </table>
                </div>
            </div>




            <div class="span12">
                <ul class="breadcrumb">                
                    <li class="active">Instituto Tecnologico de Celaya - Sistema Eventos 2013</li>
                </ul>
            </div>

        </div><!-- Container-->

    </body>

</html>


    <?php session_start();
    include ('../../models/Conexion.php');
    include ('../../models/Modelo.php');
    include ('../../libs/adodb5/adodb-pager.inc.php');
    include ('../../libs/adodb5/adodb.inc.php');
    include ('../../controllers/adminController/adminController.php');
    include("../layouts/header.php");

    $id_evento = $_GET['evt'];
   
    $admin = new adminController();
    $arreglo = $admin->staff($id_evento);
    ?>

    <link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>views/bootstrap/css/DT_bootstrap.css">
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>views/bootstrap/js/DT_bootstrap.js"></script>

    <br/><br/>
    <div class="span12">

        <h2>Equipo Staff.</h2>

        <!-------- Lista de Usuarios( DataTable con Busqueda ) ------------>
        <div class="span11">
            <table class="table table-striped table-bordered" id="example">
                <legend>Lista de Usuarios
                    <div class="btn-group pull-right">
                        <a href="<?php echo BASEURL . "views/admin/Eventos.php"?>" class="btn " type="button"><i class="icon-chevron-left"></i> Mis Eventos </a>
                        <a href="<?php echo BASEURL . "views/admin/Usuarios.php?evt=".$id_evento ?>" class="btn " type="button"><i class="icon-plus"></i> Agregar Usuario </a>
                        <button class="btn" onclick="window.print()">Imprimir</button>
                    </div>
                </legend><br/>

                <!-- Encabezado Tabla -->
                <thead>
                    <tr>
                        <th>NoCtrol</th>
                        <th>Nombre</th>                    
                        <th>Apellidos</th>                        
                        <th>Email</th>
                        <th>Staff</th>
                        <th><center>Borrar</center></th>                    
                    </tr>
                </thead>
                <!-- -------------------- -->

                <tbody>
                    <?php foreach ($arreglo as $key => $value) : 
                        $id_asistente_tipo_usuario = $arreglo[$key]['id_asistente_tipo_usuario'];
                        $nombre_asistente = $arreglo[$key]['nombre_asistente'];
                        ?>

                        <tr>
                            <td><?php echo $arreglo[$key]['nctrl_rfc'] ?></td>            
                            <td><?php echo $arreglo[$key]['nombre_asistente'] ?></td>
                            <td><?php echo $arreglo[$key]['apellido_paterno'] ?> <?php // echo $arreglo[$key]['apellido_materno'] ?></td>                            
                            <td><?php echo $arreglo[$key]['email'] ?></td>
                            <td><?php echo $arreglo[$key]['nombre_evento']?></td>
                            <td><center><a class="btn btn-mini btn-danger" href="<?php echo BASEURL . "views/admin/EliminaStf.php?evt=".$id_evento."&atu=".$id_asistente_tipo_usuario."&usr=".$nombre_asistente ?>" type="button"><i class="icon-remove icon-white"></i></a></center></td>
                        </tr>    

                    <?php endforeach; ?>
                </tbody>            
            </table>
        </div>
        <!------------------------------- Fin Data Table-------------------------------------------------->

    </div>

    <?php include("../layouts/footer.php"); ?>

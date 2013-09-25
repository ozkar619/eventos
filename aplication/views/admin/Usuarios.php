    <?php session_start();
    include ('../../models/Conexion.php');
    include ('../../models/Modelo.php');
    include ('../../libs/adodb5/adodb-pager.inc.php');
    include ('../../libs/adodb5/adodb.inc.php');
    include ('../../controllers/adminController/adminController.php');
    include("../layouts/header.php");

    $id_evento = $_GET['evt'];
    $admin = new adminController();
    $arreglo = $admin->list_users();
    ?>

    <link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>views/bootstrap/css/DT_bootstrap.css">
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>views/bootstrap/js/DT_bootstrap.js"></script>

    <br/><br/>
    <div class="span12">

        <h2>Lista de Usuarios.</h2>

        <!-------- Lista de Usuarios( DataTable con Busqueda ) ------------>
        <div class="span11">
            <table class="table table-striped table-bordered" id="example">
                <legend>Asignacion de Equipo <strong>STAFF</strong>
                    <div class="btn-group pull-right">
                        <a href="<?php echo BASEURL . "views/admin/staff.php?evt=".$id_evento ?>" class="btn " type="button"><i class="icon-chevron-left"></i> Regresar al STAFF </a>
                    </div>
                </legend><br/>

                <!-- Encabezado Tabla -->
                <thead>
                    <tr>                    
                        <th>ID</th>
                        <th>Nombre</th>                    
                        <th>Apellidos</th>
                        <th>Genero</th>
                        <th>Edad</th>
                        <th>Email</th>
                        <th>NoCtrol</th>
                        <th><center>Staff</center></th>
                    </tr>
                </thead>
                <!-- -------------------- -->


                <tbody>
                    <?php foreach ($arreglo as $key => $value) : 
                        $id_asistente = $arreglo[$key]['id_asistente'];
                        ?>

                        <tr>                            
                            <td><?php echo $arreglo[$key]['id_asistente'] ?></td>
                            <td><?php echo $arreglo[$key]['nombre_asistente'] ?></td>
                            <td><?php echo $arreglo[$key]['apellido_paterno'] ?> <?php echo $arreglo[$key]['apellido_materno'] ?></td>
                            <td><?php echo $arreglo[$key]['genero'] ?></td>
                            <td><?php echo $arreglo[$key]['edad'] ?> </td>
                            <td><?php echo $arreglo[$key]['email'] ?></td>
                            <td><?php echo $arreglo[$key]['nctrl_rfc'] ?></td>            
                            <td><center><a href="<?php echo BASEURL . "views/admin/RegStaff.php?usr=".$id_asistente."&evt=".$id_evento ?>"  class="btn btn-mini btn-success" type="button"><i class="icon-plus-sign icon-white"></i></a></center></td>
                        </tr>    

                    <?php endforeach; ?>
                </tbody>            
            </table>
        </div>
        <!------------------------------- Fin Data Table-------------------------------------------------->

    </div>

    <?php include("../layouts/footer.php"); ?>

<?php session_start();
    include ('../../models/Conexion.php');
    include ('../../libs/adodb5/adodb-pager.inc.php');
    include ('../../libs/adodb5/adodb.inc.php');
    include ('../../models/Modelo.php');
    include ('../../controllers/adminController/adminController.php');
    include ('../layouts/header.php');

    $eventos = new adminController();
    $arreglo = $eventos->consulta_eventos_admin("a.id_asistente = ".$_SESSION['id_usuario']);
?>       

    <link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>views/bootstrap/css/DT_bootstrap.css">
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>views/bootstrap/js/DT_bootstrap.js"></script>


    <br/><br/>
    <div class="span12 row-fluid">

        <h2>Lista de Eventos</h2>

        <!-------- Lista de Eventos( DataTable con Busqueda ) ------------>
        <div class="span11">
            <table class="table table-striped table-bordered" id="example">
                <legend>Mis Eventos</legend><br/>

                <!-- Encabezado Tabla -->
                <thead>
                    <tr>                    
                        <th><center>*</center></th>
                        <th>Nombre</th>                    
                        <th>Lugar</th>
                        <th>Contacto</th>                    
                        <th>Fechas</th>
                        <th>Descripcion</th>                    
                        <th>Actividades</th>
                        <th>Editar</th>
                        <th>Staff</th>
                    </tr>
                </thead>
                <!-- -------------------- -->


                <tbody>                    
                    <?php foreach ($arreglo as $key => $value) :
                        $id_evento = $arreglo[$key]["id_evento"]; #--> Mandamos id_evento como param a las Actividades (En Edicion)
                        $numero_actividades = $eventos->consulta_actividades($id_evento);
                        $imagen = $arreglo[$key]['imagen']; ?>

                        <tr>    
                            <td><center><a href="#<?php echo $arreglo[$key]['id_evento'] ?>" role="button" class="btn btn-mini" data-toggle="modal"><i class="icon-picture"></i></a></center></td>
                            <td><?php echo $arreglo[$key]['nombre_evento'] ?></td>
                            <td><?php echo $arreglo[$key]['lugar'] ?></td>
                            <td><?php echo $arreglo[$key]['contacto'] ?></td>
                            <td><?php echo $arreglo[$key]['fecha_inicio'] ?>  <strong>al</strong>  <?php echo $arreglo[$key]['fecha_fin'] ?></td>
                            <td><?php echo $arreglo[$key]['informacion'] ?></td>
                            <td><center><a class="btn btn-mini" href="<?php echo BASEURL . "views/admin/Actividades.php?evt=$id_evento" ?>" type="button"><?php echo count($numero_actividades) ?>.  <i class="icon-eye-open"></i></a></center></td>
                            <td><center><a href="<?php echo BASEURL . "views/admin/ActEvento.php?evt=$id_evento" ?>" class="btn btn-mini " type="button"><i class="icon-edit"></i></a></center></td>
                            <td><center><a href="<?php echo BASEURL . "views/admin/staff.php?evt=".$id_evento ?>" class="btn btn-mini btn-success " type="button"><i class="icon-user icon-white"></i></a></center></td>
                        </tr>  


                        <!-- Modal Imagen -->
                        <div id="<?php echo $arreglo[$key]['id_evento'] ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel"><?php echo "<center>[" . $arreglo[$key]['nombre_evento'] . "]</center>"; ?></h3>
                            </div>
                            <div class="modal-body">
                                <center><img src="<? echo BASEURL . "views/images/imgEventos/$imagen" ?>" /></center>
                            </div>
                            <div class="modal-footer">
                                <center><p>Instituto Tecnologico de Celaya</p></center>
                            </div>
                        </div>
                        <!-- Fin Modal Imagen-->                                       


                    <?php endforeach; ?>
                </tbody>            
            </table>
        </div>
        <!------------------------------- Fin Data Table-------------------------------------------------->

    </div>
    <?php include '../layouts/footer.php'; ?>

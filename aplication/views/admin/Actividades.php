    <?php session_start(); // ADMINISTRADOR
    include ('../../models/Conexion.php');
    include ('../../libs/adodb5/adodb-pager.inc.php');
    include ('../../libs/adodb5/adodb.inc.php');
    include ('../../models/Modelo.php');
    include ('../../controllers/adminController/adminController.php');
    include ('../layouts/header.php');

    $eventos = new adminController();
    $id_evento = ($_GET['evt']); #-> Recibimos Parametro
    
    $arreglo = $eventos->consulta_actividades($id_evento);
    $nombre_evento = $eventos->edita_evento($id_evento);
    $llave = $eventos->valida_eventos($id_evento, $_SESSION['nombre']);
    ?>

    <link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>views/bootstrap/css/DT_bootstrap.css">
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>views/bootstrap/js/DT_bootstrap.js"></script>

    <br/><br/>
    <div class="span12 row-fluid">

        

        <?php # Validando Lista de Eventos
        if ( count($llave)!=0 && $llave[0]['id_asistente'] == $_SESSION['id_usuario']) : ?>
        <h2>Lista de Actividades</h2>

            <!-------- Lista de Actividades ( DataTable con Busqueda ) ------------>
            <div class="span11">
                <table class="table table-striped table-bordered" id="example">            
                    <legend>Actividad [ <?php echo $nombre_evento[0]['nombre_evento'] ?> ]
                        <!--------------- Menu De Opciones del Admin No NavBar ---------------->
                        <div class="btn-group pull-right">        
                            <a href="<?php echo BASEURL . "views/admin/Eventos.php" ?>" class="btn " type="button"><i class="icon-chevron-left"></i> Mis Eventos </a>
                            <a href="<?php echo BASEURL . "views/admin/RegActividades.php?evt=$id_evento" ?>" class="btn " type="button"><i class="icon-plus"></i> Agregar Actividad</a>                    
                        </div>
                        <!--------------------------------------------------------------------->
                    </legend><br/>

                    <!--Encabezado Tabla-->
                    <thead>
                        <tr>
                            <th><center>*</center></th>
                            <th>Nombre</th>
                            <th>Instructor</th>
                            <th>Lugar</th>
                            <th>Precio</th>                    
                            <th>Fechas</th>
                            <th>Horario</th>
                            <th>Capacidad</th>
                            <th>Descripcion</th>                    
                            <th>Users</th>
                            <th>Edit</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <!-- -------------------- -->


                    <tbody>
                        <?php foreach ($arreglo as $key => $value): 
                            $id_actividad = $arreglo[$key]['id_actividad'];
                            $imagen = $arreglo[$key]['imagen']; 
                            $id_instructor = $arreglo[$key]['id_instructor'];
                            $instructor = $eventos->list_users("WHERE id_asistente = ".$id_instructor)
                            ?>
                            
                            <tr>                 
                                <td><center><a href="#<?php echo $arreglo[$key]['id_actividad'] ?>" role="button" class="btn btn-mini" data-toggle="modal"><i class="icon-picture"></i></a></center></td>
                                <td><?php echo $arreglo[$key]['nombre_actividad'] ?></td>
                                <td><?php echo $instructor[0]['nombre_asistente'] ?> <?php echo $instructor[0]['apellido_paterno'] ?> <?php echo $instructor[0]['apellido_materno'] ?></td>
                                <td><?php echo $arreglo[$key]['lugar'] ?></td>
                                <td><?php echo $arreglo[$key]['precio'] ?></td>
                                <td><?php echo $arreglo[$key]['fecha_inicio'] ?>  <strong>al</strong>  <?php echo $arreglo[$key]['fecha_fin'] ?> </td>                            
                                <td><?php echo $arreglo[$key]['hora_inicio'] ?>  <strong>a</strong>  <?php echo $arreglo[$key]['hora_fin'] ?></td>                            
                                <td><?php echo $arreglo[$key]['capacidad'] ?></td>
                                <td><?php echo $arreglo[$key]['descripcion'] ?></td>
                                <td><center><a href="<?php echo BASEURL . "views/admin/UsuariosAct.php?evt=$id_evento&act=$id_actividad" ?>" class="btn btn-mini" type="button"><i class="icon-user"></i></a></center></td>
                                <td><center><a href="<?php echo BASEURL . "views/admin/ActActividades.php?evt=$id_evento&act=$id_actividad" ?>" class="btn btn-mini" type="button"><i class="icon-edit"></i></a></center></td>
                                <td><center><a class="btn btn-mini btn-danger" href="<?php echo BASEURL . "views/admin/EliminaAct.php?act=$id_actividad&evt=$id_evento" ?>" type="button"><i class="icon-remove icon-white"></i></a></center></td>
                            </tr>                            

                            
                            <!-- Modal Imagen -->
                            <div id="<?php echo $arreglo[$key]['id_actividad'] ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 id="myModalLabel"><?php echo "<center>[" . $arreglo[$key]['nombre_actividad'] . "]</center>"; ?></h3>
                                </div>
                                <div class="modal-body">
                                    <center><img src="<?php echo BASEURL . "views/images/imgActividades/".$imagen ?>" /></center>
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

            <?php # Denegando Lista de Eventos
                endif; 
                if (count($llave) == 0) {
                    die('<h2>Error 404... Tu Solicitud no ha podido ser atendida. !!!');
                } else
                if ($llave[0]['id_asistente'] != $_SESSION['id_usuario']){                    
                    die('<h2>Error 404... Tu Solicitud no ha podido ser atendida. !!!');
                }                    
            ?>
    </div>
    
<?php include '../layouts/footer.php'; ?> 
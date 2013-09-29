    <?php session_start(); // ADMINISTRADOR
    include ('../../models/Conexion.php');
    include ('../../models/Modelo.php');
    include ('../../models/Usuario.php');
    include ('../../libs/adodb5/adodb-pager.inc.php');
    include ('../../libs/adodb5/adodb.inc.php');
    include ('../../controllers/adminController/adminController.php');
    include("../layouts/header.php");

    $admin = new adminController();
    $id_actividad = $_GET['act'];
    $id_evento = $_GET['evt'];
    
    $arreglo = $admin->lista_usuarios($id_actividad);
    $llave = $admin->valida_actividades($id_evento, $_SESSION['nombre'], $id_actividad);
    ?>

    <link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>views/bootstrap/css/DT_bootstrap.css">
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>views/bootstrap/js/DT_bootstrap.js"></script>

    <br/><br/>
    <div class="span12">

        <?php # Validando Lista de Eventos
        if (count($llave)!=0 && $llave[0]['id_asistente'] == $_SESSION['id_usuario']) :
            ?>

            <h2>lista de usuarios.</h2>

            
            <!-------- Lista de Usuarios( DataTable con Busqueda ) ------------>
            <div class="span11">
                <table class="table table-striped table-bordered" id="example">
                    <legend>Usuarios Registrados [ <?php                    
                    if (count($arreglo) > 0) {
                        echo $arreglo[0]['nombre_actividad'];
                    } else {
                        echo '';
                    }?> ]
                    
                        <div class="btn-group pull-right">
                            <a href="<? echo BASEURL . "views/admin/Actividades.php?evt=$id_evento" ?>" class="btn"><i class="icon-chevron-left"></i> Actividades</a>                
                            <a href="" class="btn" onclick="window.print()">Imprimir</a>
                        </div>
                    </legend><br/>

                    <!-- Encabezado Tabla -->
                    <thead>
                        <tr>                    
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Edad</th>
                            <th>Email</th>
                            <th>Numero Control</th>
                            <th>Fechas Registro</th>
                            <th>Pago</th>
                            <th>Asistio</th>                            
                            <th><center>Borrar</center></th>
                        </tr>
                    </thead>
                    <!-- -------------------- -->


                    <tbody>
                        <?php foreach ($arreglo as $key => $value) : 
                            $id_usuario = $arreglo[$key]['id_asistente']; 
                            $id_asistente_evento = $arreglo[$key]['id_asistente_evento'];
                            $id_asistente = $arreglo[$key]['id_asistente'];
                            $asistio = $arreglo[$key]['asistio'];
                            $pago = $arreglo[$key]['pago'];
                            ?>

                            <tr>                        
                                <td><?php echo $arreglo[$key]['nombre_asistente'] ?></td>
                                <td><?php echo $arreglo[$key]['apellido_paterno'] ?> <?php echo $arreglo[$key]['apellido_materno'] ?></td>
                                <td><?php echo $arreglo[$key]['edad'] ?></td>
                                <td><?php echo $arreglo[$key]['email'] ?> </td>
                                <td><?php echo $arreglo[$key]['nctrl_rfc'] ?></td>
                                <td><?php echo $arreglo[$key]['fecha_registro'] ?></td>
                                <td>
                                    <?php if ($arreglo[$key]['pago'] == 0) : $identificador="pago" ?>
                                        <center><a href="<?php echo "ActAsistentes.php?aev=".$id_asistente_evento."&act=".$id_actividad."&asis=".$id_asistente."&stt=".$pago."&evt=".$id_evento."&id=".$identificador?>" class="btn btn-mini btn-danger" name="confirm" type="button"> NO <i class=" icon-thumbs-down icon-white"></i></a></center>
                                    <?php endif; if ($arreglo[$key]['pago'] != 0) : $identificador="pago" ?>
                                        <center><a href="<?php echo "ActAsistentes.php?aev=".$id_asistente_evento."&act=".$id_actividad."&asis=".$id_asistente."&stt=".$pago."&evt=".$id_evento."&id=".$identificador?>" class="btn btn-mini btn-success " name="confirm" type="button"> SI <i class=" icon-thumbs-up icon-white"></i></a></center>
                                    <?php endif;?>
                                </td>
                                <td>
                                    <?php if ($arreglo[$key]['asistio'] == 0) : $identificador="asistio"?>
                                        <center><a href="<?php echo "ActAsistentes.php?aev=".$id_asistente_evento."&act=".$id_actividad."&asis=".$id_asistente."&stt=".$asistio."&evt=".$id_evento."&id=".$identificador?>" class="btn btn-mini btn-danger" name="confirm" type="button"> NO <i class=" icon-thumbs-down icon-white"></i></a></center>
                                    <?php endif; if ($arreglo[$key]['asistio'] != 0) : $identificador="asistio"?>
                                        <center><a href="<?php echo "ActAsistentes.php?aev=".$id_asistente_evento."&act=".$id_actividad."&asis=".$id_asistente."&stt=".$asistio."&evt=".$id_evento."&id=".$identificador?>" class="btn btn-mini btn-success " name="confirm" type="button"> SI <i class=" icon-thumbs-up icon-white"></i></a></center>
                                    <?php endif;?>
                                </td>
                                <td><center><a class="btn btn-mini btn-danger" href="<?php echo BASEURL . "views/admin/EliminaUsr.php?act=$id_actividad&evt=$id_evento&usr=$id_usuario" ?>" type="button"><i class="icon-remove icon-white"></i></a></center></td>                        
                            </tr>    
                            
                        <?php endforeach; ?>
                    </tbody>            
                </table>
            </div>
            <!------------------------------- Fin Data Table-------------------------------------------------->            

            <?php # Denegando Lista de Eventos
            
                endif; 
                if (count($llave)==0) {
                    die('<h2>Error 404... Tu Solicitud no ha podido ser atendida. !!!');
                } else
                if ($llave[0]['id_asistente'] != $_SESSION['id_usuario'])
                    die('<h2>Error 404... Tu Solicitud no ha podido ser atendida. !!!');
            ?>

    </div>
    <?php include("../layouts/footer.php"); ?>

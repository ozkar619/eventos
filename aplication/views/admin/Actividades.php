<?php 
session_start();
include ('../../models/Conexion.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../models/Modelo.php');
include ('../../controllers/adminController/adminController.php');
include ('../layouts/header.php');

$eventos = new adminController();
$id_evento = ($_GET['id_evento']); #-> Recibimos Parametro
$arreglo = $eventos->consulta_actividades($id_evento);
$nombre_evento= $eventos->edita_evento($id_evento);
$llave = $eventos->valida_eventos($id_evento, $_SESSION['nombre']);

?>

<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>views/bootstrap/css/DT_bootstrap.css">
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>views/bootstrap/js/DT_bootstrap.js"></script>

<br/><br/>
<div class="span12 row-fluid">
    
    <h2>Lista de Actividades</h2>
    
    <?php # Validando Lista de Eventos
    if($llave[0]['id_asistente'] == $_SESSION['id_usuario']) :?>

    <!-------- Lista de Actividades ( DataTable con Busqueda ) ------------>
    <div class="span11">
        <table class="table table-striped table-bordered" id="example">            
            <legend>Actividad [ <?php echo $nombre_evento[0]['nombre_evento']?> ]
                <!--------------- Menu De Opciones del Admin No NavBar ---------------->
                <div class="btn-group pull-right">        
                    <a href="<?php echo BASEURL . "views/admin/Eventos.php?id_evento=$id_evento" ?>" class="btn " type="button"><i class="icon-chevron-left"></i> Mis Eventos </a>
                    <a href="<?php echo BASEURL . "views/admin/RegActividades.php?id_evento=$id_evento" ?>" class="btn " type="button"><i class="icon-plus"></i> Agregar Actividad</a>                    
                </div>
                <!--------------------------------------------------------------------->
            </legend><br/>

            <!--Encabezado Tabla-->
            <thead>
                <tr>
                    <th><center>*</center></th>
                    <th>Nombre</th>
                    <th>Lugar</th>
                    <th>Precio</th>                    
                    <th>Fechas</th>
                    <th>Horario</th>
                    <th>Descripcion</th>                    
                    <th>Users</th>
                    <th>Edit</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <!-- -------------------- -->


            <tbody>
                <?php foreach ($arreglo as $key => $value):
                    # Obtenemos id_actividad para enviar por parametro junto al id_evento
                    $id_actividad = $arreglo[$key]['id_actividad']
                    ?>

                    <tr>                 
                        <td><center><a class="btn btn-mini" href="#" type="button"><i class="icon-picture"></i></a></center></td>
                        <td><?php echo $arreglo[$key]['nombre_actividad'] ?></td>
                        <td><?php echo $arreglo[$key]['lugar'] ?></td>
                        <td><?php echo $arreglo[$key]['precio'] ?></td>
                        <td><?php echo $arreglo[$key]['fecha_inicio'] ?>  <strong>al</strong>  <?php echo $arreglo[$key]['fecha_fin'] ?> </td>                            
                        <td><?php echo $arreglo[$key]['hora_inicio'] ?>  <strong>a</strong>  <?php echo $arreglo[$key]['hora_fin'] ?></td>                            
                        <td><?php echo $arreglo[$key]['descripcion'] ?></td>
                        <td><center><a href="<?php echo BASEURL . "views/admin/usuarios.php?id_evento=$id_evento&id_actividad=$id_actividad" ?>" class="btn btn-mini" type="button"><i class="icon-user"></i></a></center></td>
                        <td><center><a href="<?php echo BASEURL . "views/admin/ActActividades.php?id_evento=$id_evento&id_actividad=$id_actividad" ?>" class="btn btn-mini" type="button"><i class="icon-edit"></i></a></center></td>
                        <td><center><a class="btn btn-mini btn-danger" href="#" type="button"><i class="icon-remove icon-white"></i></a></center></td>
                    </tr>                            

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!------------------------------- Fin Data Table-------------------------------------------------->
    
    <?php # Denegando Lista de Eventos
    endif; if($llave[0]['id_asistente'] != $_SESSION['id_usuario'])
        die('<h2>Error 404... Tu Solicitud no ha podido ser atendida. !!!');
    ?>
</div>
<?php include '../layouts/footer.php'; ?>   
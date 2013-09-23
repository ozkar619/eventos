<?php
session_start();
if(!isset($_SESSION['superadmin']))
    header ("Location: ../site/inicio.php");
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Evento.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/superadminController/superadminController.php');

$superadmin = new SuperadminController();
$arreglo = $superadmin->lista_eventos();

include("../layouts/header.php");
?>

<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>views/bootstrap/css/DT_bootstrap.css">
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>views/bootstrap/js/DT_bootstrap.js"></script>

<div class="span12">

    <h2>lista de Eventos.</h2>


    <!-------- Lista de Eventos( DataTable con Busqueda ) ------------>
    <div class="span11">
        <table class="table table-striped table-bordered" id="example">
            <legend>Todos los Eventos Registrados
                <div class="btn-group pull-right">
                    <button class="btn"><a href="registroEventos.php">Crear Evento</a></button>
                    <button class="btn" onclick="window.print();">Imprimir</button>
                </div>
            </legend><br/>

            <!-- Encabezado Tabla -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>                    
                    <th>Contacto</th>
                    <th>Lugar</th>
                    <th>Informaci&oacute;n</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de fin</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th>Administrador</th>
                    <th>Tipos de usuario</th>
                </tr>
            </thead>
            <!-- -------------------- -->


            <tbody>
                <?php
                foreach ($arreglo as $key => $value) :
                    $id_evento = $arreglo[$key]["id_evento"];
                    ?>
                    <tr>                            
                        <td><?php echo $arreglo[$key]['id_evento'] ?></td>
                        <td><?php echo $arreglo[$key]['nombre_evento'] ?></td>
                        <td><?php echo $arreglo[$key]['contacto'] ?></td>
                        <td><?php echo $arreglo[$key]['lugar'] ?></td>
                        <td><?php echo $arreglo[$key]['informacion'] ?> </td>
                        <td><?php echo $arreglo[$key]['fecha_inicio'] ?></td>
                        <td><?php echo $arreglo[$key]['fecha_fin'] ?></td>
                        <td><center><a href="<?php echo BASEURL . "views/superadmin/actualizarEvento.php?id_evento=$id_evento" ?>" class="btn  btn-inverse" type="button"><i class="icon-edit icon-white"></i></a></center></td>
                        <td><center><a href="<?php echo BASEURL . "views/superadmin/eliminaEvento.php?id_evento=$id_evento" ?>" class="btn  btn-inverse" type="button"><i class="icon-remove icon-white"></i></a></center></td>
                        <td><center><a href="<?php echo BASEURL . "views/superadmin/registroAdminEventos.php?id_evento=$id_evento" ?>" class="btn btn-inverse" type="button"><i class="icon-user icon-white"></i></a></center></td>
                        <td><center><a href="<?php echo BASEURL . "views/superadmin/registroEventosTiposUsuario.php?id_evento=$id_evento" ?>" class="btn btn-inverse" type="button"><i class="icon-plus-sign icon-white"></i></a></center></td>
                </tr>    

<?php endforeach; ?>
            </tbody>            
        </table>
    </div>
    <!------------------------------- Fin Data Table-------------------------------------------------->

</div>

<?php
include("../layouts/footer.php");
?>
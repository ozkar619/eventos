<?php
session_start();
if(!isset($_SESSION['superadmin']))
    header ("Location: ../site/inicio.php");
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Tipo_Actividad.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/superadminController/superadminController.php');

$superadmin = new SuperadminController();
$arreglo = $superadmin->lista_tipos_actividades();

include("../layouts/header.php");
?>

<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>views/bootstrap/css/DT_bootstrap.css">
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>views/bootstrap/js/DT_bootstrap.js"></script>

<div class="span12">

    <h2>lista de Tipos de Actividades.</h2>
    

    <!-------- Lista de Tipos de Actividad( DataTable con Busqueda ) ------------>
    <div class="span11">
        <table class="table table-striped table-bordered" id="example">
            <legend>Todos los tipos de actividades registradas
                <div class="btn-group pull-right">
                    <button class="btn"><a href="registroTiposActividad.php">Crear Tipo de actividad</a></button>
                    <button class="btn" onclick="window.print();">Imprimir</button>
                </div>
            </legend><br/>

            <!-- Encabezado Tabla -->
            <thead>
                <tr>
                    <th>id</th>                    
                    <th>Tipo de actividad</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <!-- -------------------- -->


            <tbody>
                <?php foreach ($arreglo as $key => $value) : 
                $id_tipo_actividad = $arreglo[$key]["id_tipo_actividad"];
                ?>
                    <tr>   
                        <td><?php echo $arreglo[$key]['id_tipo_actividad']?></td>
                        <td><?php echo $arreglo[$key]['tipo_actividad']?></td>
                        <td><center><a href="<?php echo BASEURL . "views/superadmin/actualizaTiposActividad.php?id_tipo_actividad=$id_tipo_actividad" ?>" class="btn  btn-inverse" type="button"><i class="icon-edit icon-white"></i></a></center></td>
                        <td><center><a href="<?php echo BASEURL . "views/superadmin/eliminaTiposActividad.php?id_tipo_actividad=$id_tipo_actividad" ?>" class="btn  btn-inverse" type="button"><i class="icon-remove icon-white"></i></a></center></td>
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
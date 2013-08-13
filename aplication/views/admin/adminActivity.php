<?php
session_start();
include ('../../models/Conexion.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../models/Modelo.php');
include ('../../controllers/adminController/adminController.php');
include ('../layouts/header.php');

$eventos = new adminController();
$arreglo = $eventos->consulta_actividades($_GET['id_evento']);
$aux = ($_GET['id_evento']);
?>   

<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>views/bootstrap/css/DT_bootstrap.css">
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>views/bootstrap/js/DT_bootstrap.js"></script>

<br/><br/>
<div class="span12 row-fluid">

    <!--------------- Menu De Opciones del Admin No NavBar ---------------->
    <div class="span11">
        <ul class="nav nav-pills pull-right">            
            <a href="<?php echo BASEURL."views/admin/adminEvents.php?id_evento=$aux" ?>" class="btn btn-inverse" type="button"><i class="icon-chevron-left icon-white"></i> Mis Eventos </a>
            <a href="<?php echo BASEURL."views/admin/registroActividades.php?id_evento=$aux" ?>" class="btn btn-inverse " type="button"><i class="icon-plus icon-white"></i> Agregar Actividad</a>            
        </ul>                
    </div>
    <!--------------------------------------------------------------------->


    <!-------- Lista de Actividades ( DataTable con Busqueda ) ------------>
    <div class="span11">
        <table class="table table-striped table-bordered" id="example">            
            <legend>Mis Actividades</legend><br/>

            <!--Encabezado Tabla-->
            <thead>
                <tr>                    
                    <th>Nombre</th>
                    <th>Lugar</th>
                    <th>Precio</th>                    
                    <th>Fechas</th>
                    <th>Horario</th>
                    <th>Descripcion</th>
                    <!--<th>Imagen</th>-->
                    <th>Admin</th>
                </tr>
            </thead>
            <!-- -------------------- -->


            <tbody>
                <?php foreach ($arreglo as $key => $value): ?>

                    <tr>                            
                        <td><?php echo $arreglo[$key]['nombre_actividad'] ?></td>
                        <td><?php echo $arreglo[$key]['lugar'] ?></td>
                        <td><?php echo $arreglo[$key]['precio'] ?></td>
                        <td><?php echo $arreglo[$key]['fecha_inicio'] ?>  <strong>al</strong>  <?php echo $arreglo[$key]['fecha_fin'] ?> </td>                            
                        <td><?php echo $arreglo[$key]['hora_inicio'] ?>  <strong>a</strong>  <?php echo $arreglo[$key]['hora_fin'] ?></td>                            
                        <td><?php echo $arreglo[$key]['descripcion'] ?></td> 
                        <!--<td><?php // echo $arreglo[$key]['imagen']  ?></td>--> 
                        <td><center><a class="btn btn-inverse" type="button"><i class="icon-edit icon-white"></i></a></center></td>
                    </tr>                            

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!------------------------------- Fin Data Table-------------------------------------------------->

</div>
<?php include '../layouts/footer.php'; ?>   

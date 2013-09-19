<?php
session_start();
include ('../../models/Conexion.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../models/Modelo.php');
include ('../../controllers/adminController/adminController.php');
include ('../layouts/header.php');

$eventos = new adminController();
$arreglo = $eventos->consulta_eventos($_SESSION['id_usuario']);
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
                </tr>
            </thead>
            <!-- -------------------- -->


            <tbody>
                <?php foreach ($arreglo as $key => $value) :
                    $id_evento = $arreglo[$key]["id_evento"]; #--> Mandamos id_evento como param a las Actividades (En Edicion)
                    $numero_actividades = $eventos->consulta_numero_actividades($id_evento);?>

                    <tr>    
                        <td><center><a class="btn btn-mini" href="#" type="button"><i class="icon-picture"></i></a></center></td>
                        <td><?php echo $arreglo[$key]['nombre_evento'] ?></td>
                        <td><?php echo $arreglo[$key]['lugar'] ?></td>
                        <td><?php echo $arreglo[$key]['contacto'] ?></td>
                        <td><?php echo $arreglo[$key]['fecha_inicio'] ?>  <strong>al</strong>  <?php echo $arreglo[$key]['fecha_fin'] ?></td>
                        <td><?php echo $arreglo[$key]['informacion'] ?></td>                                                
                        <td><center><a class="btn btn-mini" href="<?php echo BASEURL . "views/admin/Actividades.php?id_evento=$id_evento" ?>" type="button"><?php echo $numero_actividades[0]['numero_actividades'] ?>.  <i class="icon-eye-open"></i></a></center></td>
                        <td><center><a href="<?php echo BASEURL . "views/admin/ActEvento.php?id_evento=$id_evento" ?>" class="btn btn-mini " type="button"><i class="icon-edit"></i></a></center></td>                        
                    </tr>  
                <?php endforeach; ?>
            </tbody>            
        </table>
    </div>
    <!------------------------------- Fin Data Table-------------------------------------------------->

</div>
<?php include '../layouts/footer.php'; ?>

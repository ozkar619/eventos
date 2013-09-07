<?php
session_start();
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
                    <button class="btn">Imprimir</button>
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
                </tr>
            </thead>
            <!-- -------------------- -->


            <tbody>
                <?php foreach ($arreglo as $key => $value) : ?>

                    <tr>                            
                        <td><?php echo $arreglo[$key]['id_evento'] ?></td>
                        <td><?php echo $arreglo[$key]['nombre_evento'] ?></td>
                        <td><?php echo $arreglo[$key]['contacto']?></td>
                        <td><?php echo $arreglo[$key]['lugar'] ?></td>
                        <td><?php echo $arreglo[$key]['informacion'] ?> </td>
                        <td><?php echo $arreglo[$key]['fecha_inicio'] ?></td>
                        <td><?php echo $arreglo[$key]['fecha_fin'] ?></td>                        
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
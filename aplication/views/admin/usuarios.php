<?php
session_start();
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Usuario.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/adminController/adminController.php');

$admin = new adminController();
$id_actividad = $_GET['id_actividad'];
$id_evento = $_GET['id_evento'];
$arreglo = $admin->lista_usuarios($id_actividad);

$llave = $admin->valida_actividades($id_evento ,$_SESSION['nombre'], $id_actividad);

include("../layouts/header.php");
?>
<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>views/bootstrap/css/DT_bootstrap.css">
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>views/bootstrap/js/DT_bootstrap.js"></script>

<div class="span12">

    <?php # Validando Lista de Eventos
    if($llave[0]['id_asistente'] == $_SESSION['id_usuario']) :?>
    
    <h2>lista de usuarios.</h2>
    

    <!-------- Lista de Usuarios( DataTable con Busqueda ) ------------>
    <div class="span11">
        <table class="table table-striped table-bordered" id="example">
            <legend>Usuarios Registrados [ <?php echo $arreglo[0]['nombre_actividad']?> ]
                
                <div class="btn-group pull-right">
                    <a href="<? echo BASEURL."views/admin/Actividades.php?id_evento=$id_evento" ?>" class="btn"><i class="icon-chevron-left"></i> Actividades</a>                
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
                    <th>Id Instructor</th>
                    <th><center>Borrar</center></th>
                </tr>
            </thead>
            <!-- -------------------- -->


            <tbody>
                <?php foreach ($arreglo as $key => $value) : ?>

                    <tr>                        
                        <td><?php echo $arreglo[$key]['nombre_asistente'] ?></td>
                        <td><?php echo $arreglo[$key]['apellido_paterno']?> <?php echo $arreglo[$key]['apellido_materno']?></td>
                        <td><?php echo $arreglo[$key]['edad'] ?></td>
                        <td><?php echo $arreglo[$key]['email'] ?> </td>
                        <td><?php echo $arreglo[$key]['nctrl_rfc'] ?></td>
                        <td><?php echo $arreglo[$key]['fecha_registro'] ?></td>
                        <td><?php echo $arreglo[$key]['pago'] ?></td>
                        <td><?php echo $arreglo[$key]['asistio'] ?></td>
                        <td><?php echo $arreglo[$key]['id_instructor'] ?></td>                        
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
<?php include("../layouts/footer.php"); ?>

<?php
session_start();
if(!isset($_SESSION['superadmin']))
    header ("Location: ../site/inicio.php");
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Eventos_Admin.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/superadminController/superadminController.php');

$superadmin = new SuperadminController();
$arreglo = $superadmin->lista_administradores();

include("../layouts/header.php");
?>

<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>views/bootstrap/css/DT_bootstrap.css">
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>views/bootstrap/js/DT_bootstrap.js"></script>

<div class="span12">

    <h2>lista de Administradores.</h2>
    

    <!-------- Lista de Administradores( DataTable con Busqueda ) ------------>
    <div class="span11">
        <table class="table table-striped table-bordered" id="example">
            <legend>Todos los Administradores Registrados
                <div class="btn-group pull-right">
                    
                    <button class="btn" onclick="window.print();">Imprimir</button>
                </div>
            </legend><br/>

            <!-- Encabezado Tabla -->
            <thead>
                <tr>
                    <th>Evento</th>                    
                    <th>Administrador</th>
                    <th>Correo del administrador</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <!-- -------------------- -->


            <tbody>
                <?php foreach ($arreglo as $key => $value) : 
                $id_evento_admin = $arreglo[$key]["id_evento_admin"];
                ?>
                    <tr>   
                        <td><?php echo $arreglo[$key]['Evento']?></td>
                        <td><?php echo $arreglo[$key]['Nombre']." ".$arreglo[$key]['Apellido'] ?></td>
                        <td><?php echo $arreglo[$key]['Correo'] ?></td>
                        <td><center><a href="<?php echo BASEURL . "views/superadmin/actualizaAdmin_Evento.php?id_evento_admin=$id_evento_admin" ?>" class="btn  btn-inverse" type="button"><i class="icon-edit icon-white"></i></a></center></td>
                        <td><center><a href="<?php echo BASEURL . "views/superadmin/eliminaAdmin_Evento.php?id_evento_admin=$id_evento_admin" ?>" class="btn  btn-inverse" type="button"><i class="icon-remove icon-white"></i></a></center></td>
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
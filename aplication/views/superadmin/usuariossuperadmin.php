<?php
session_start();
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Usuario.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/adminController/adminController.php');

$admin = new adminController();
$arreglo = $admin->list_users();

include("../layouts/header.php");
?>
<link rel="stylesheet" type="text/css" href="<?php echo BASEURL; ?>views/bootstrap/css/DT_bootstrap.css">
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>libs/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="<?php echo BASEURL; ?>views/bootstrap/js/DT_bootstrap.js"></script>

<div class="span12">

    <h2>lista de Usuarios.</h2>
    

    <!-------- Lista de Usuarios( DataTable con Busqueda ) ------------>
    <div class="span11">
        <table class="table table-striped table-bordered" id="example">
            <legend>Todos los Usuarios Registrados
                <div class="btn-group pull-right">
                    <button class="btn" onclick="window.print()">Imprimir</button>
                </div>
            </legend><br/>

            <!-- Encabezado Tabla -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>                    
                    <th>Apellidos</th>
                    <th>Genero</th>
                    <th>Edad</th>
                    <th>Email</th>
                    <th>NoCtrol</th>
                    <th>Tipo de usuario</th>
                </tr>
            </thead>
            <!-- -------------------- -->


            <tbody>
                <?php foreach ($arreglo as $key => $value) : 
                    $id_asistente = $arreglo[$key]["id_asistente"];
                    ?>

                    <tr>                            
                        <td><?php echo $arreglo[$key]['id_asistente'] ?></td>
                        <td><?php echo $arreglo[$key]['nombre_asistente'] ?></td>
                        <td><?php echo $arreglo[$key]['apellido_paterno']?> <?php echo $arreglo[$key]['apellido_materno']?></td>
                        <td><?php echo $arreglo[$key]['genero'] ?></td>
                        <td><?php echo $arreglo[$key]['edad'] ?> </td>
                        <td><?php echo $arreglo[$key]['email'] ?></td>
                        <td><?php echo $arreglo[$key]['nctrl_rfc'] ?></td>
                        <td><center><a href="<?php echo BASEURL . "views/superadmin/registroAsistentesTiposUsuario.php?id_asistente=$id_asistente" ?>" class="btn  btn-inverse" type="button"><i class="icon-user icon-white"></i></a></center></td>
<!--                        <td><form method="POST" action="registroAsistentesTiposUsuario.php"><input name="id_asistente" type="hidden" value="<?php // echo $arreglo[$key]['id_asistente'];?>"/><input type="submit" value="editar"/></form></td>-->
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
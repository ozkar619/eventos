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
?>   

<!-- *******************************************************************************************************************************-->
<!--    REQUIERO AYUDA AQUI    -->
<!--    Estas  Hojas de Estilo y JavaScript Son 
        Exclusivas para los DataTables con Bootstrap 
        Espero q se puedan acomodar en el Header ya que 
        yo no pude y se ven mal Aqui GRACIAS :) -->
<link rel="stylesheet" type="text/css" href="../bootstrap/css/DT_bootstrap.css">
<script type="text/javascript" charset="utf-8" language="javascript" src="../../libs/DataTables-1.9.4/media/js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="../../libs/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="../bootstrap/js/DT_bootstrap.js"></script>
<!-- *******************************************************************************************************************************-->


<!-- Use saltos para q la barra no tapara el menu -->
<br/><br/>
<!-- -------------------------------------------- -->

<div class="span12 row-fluid">   
    
    
    <!--------------- Menu De Opciones del Admin No NavBar ---------------->
    <div class="span3">
        <ul class="nav nav-tabs nav-stacked">
            <li class="active"><a href="#">Actividades</a></li>
            <li><a href="./initAdmin.php">Inicio</a></li>
            <li><a href="./adminEvents.php">Eventos</a></li>
            <li><a href="./adminConfig.php">Configuracion</a></li>
            <!--<li><a href="#">Mas Opciones</a></li>-->
        </ul>
    </div>                
    <!--------------------------------------------------------------------->
    
    
    

    <!-------- Lista de Actividades ( DataTable con Busqueda ) ------------>
    <div class="span8">
        <table class="table table-striped table-bordered" id="example">
            
            <!--Encabezado Tabla-->
            <thead>
                <tr>
                    <th>id Actividad</th>
                    <th>Nombre Actividad</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Costo</th>                                
                    <th>Admin</th>
                </tr>
            </thead>
            <!-- -------------------- -->
            
            
            <tbody>
                <?php foreach ($arreglo as $key => $value): ?>

                    <?php #Si el Admin Quiere Editar Campos Entra
                    if (false) : ?>
                
                        <!-- Aun Falta Edicion aqui algun form o algo -->
                        <!-- Aun Falta Edicion aqui algun form o algo -->
                        <!-- Aun Falta Edicion aqui algun form o algo -->
                        <!-- Aun Falta Edicion aqui algun form o algo -->
                        <!-- Aun Falta Edicion aqui algun form o algo -->
                        <!-- Aun Falta Edicion aqui algun form o algo -->                    
                        
                        <?php #Cuando Acaba de Editar Campos o Nunca Se ha Presionado Editar Entra
                        else : ?>
                        
                        <tr>
                            <td><?php echo $arreglo[$key]['id_actividad'] ?></td>
                            <td><?php echo $arreglo[$key]['nombre_actividad'] ?></td>
                            <td><?php echo $arreglo[$key]['fecha_inicio'] ?></td>
                            <td><?php echo $arreglo[$key]['fecha_fin'] ?></td>
                            <td><?php echo $arreglo[$key]['precio'] ?></td> 
                            <td><center><a class="btn btn-inverse" type="button"><i class="icon-edit icon-white"></i></a></center></td>
                        </tr>    
                        
                    <?php endif; ?>

                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <!------------------------------- Fin Data Table-------------------------------------------------->

</div>
<?php include '../layouts/footer.php'; ?>   
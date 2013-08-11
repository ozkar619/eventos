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
            <li><a href="./initAdmin.php">Inicio</a></li>
            <li class="active"><a href="#">Eventos</a></li>
            <li><a href="./adminConfig.php">Configuracion</a></li>
            <!--<li><a href="#">Mas Opciones</a></li>-->
        </ul>
    </div>
    <!--------------------------------------------------------------------->




    <!-------- Lista de Eventos( DataTable con Busqueda ) ------------>
    <div class="span8">
        <table class="table table-striped table-bordered" id="example">
            
            <!-- Encabezado Tabla -->
            <thead>
                <tr>
                    <th>id_evento</th>
                    <th>nombre</th>                    
                    <th>fecha inicio</th>
                    <th>fecha fin</th>
                    <th>lugar</th>                    
                    <th>Actividades</th>
                    <th>Admin</th>
                </tr>
            </thead>
            <!-- -------------------- -->
            
                        
            <tbody>
                <?php foreach ($arreglo as $key => $value) : 
                    $aux = $arreglo[$key]["id_evento"]; #--> Mandamos id_evento como param a las Actividades (En Edicion)
                    $arregloAct = $eventos->consulta_numero_actividades($arreglo[$key]['id_evento']);
                 ?>

                    <?php #Si el Admin Quiere Editar Campos Entra
                    if (false) :?>
                        
                        <!-- Aun Falta Edicion aqui algun form o algo -->
                        <!-- Aun Falta Edicion aqui algun form o algo -->
                        <!-- Aun Falta Edicion aqui algun form o algo -->
                        <!-- Aun Falta Edicion aqui algun form o algo -->
                        <!-- Aun Falta Edicion aqui algun form o algo -->
                        <!-- Aun Falta Edicion aqui algun form o algo -->                    
                        
                        <?php #Cuando Acaba de Editar Campos o Nunca Se ha Presionado Editar Entra
                        else : ?>                  
                    
                        <tr>
                            <td><?php echo $arreglo[$key]['id_evento'] ?></td>
                            <td><?php echo $arreglo[$key]['nombre_evento'] ?></td>
                            <td><?php echo $arreglo[$key]['fecha_inicio'] ?></td>
                            <td><?php echo $arreglo[$key]['fecha_fin'] ?></td>
                            <td><?php echo $arreglo[$key]['lugar'] ?></td>                            
                            <td><?php echo $arregloAct[0]['numero_actividades'] ?><a class="btn btn-inverse pull-right" href="<?php echo "adminActivity.php?id_evento=$aux" ?>" type="button"><i class="icon-plus icon-white"></i></a></th>
                            <td><center><a class="btn  btn-inverse" type="button"><i class="icon-edit icon-white"></i></a></center></td>
                        </tr>    
                        
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>            
        </table>
    </div>
    <!------------------------------- Fin Data Table-------------------------------------------------->
    
</div>
<?php include '../layouts/footer.php'; ?>
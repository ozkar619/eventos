<?php
session_start();
include ('../../models/Conexion.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../models/Modelo.php');
include ('../../models/Asistentes_Actividades.php');
include ('../../controllers/siteController/asistente_actividadesController.php');
include ('../layouts/header.php');

//if ((is_int($_GET['id_eve'])) || (is_int($_GET['tipo']))) {
//   header('Location:inicio.php');
//   exit(); 
//}
// NO SIRVE LA VALIDACION DE VARIABLES PASADAS POR GET

$acti = new asistente_actividadesController();
$ruta = BASEURL."views/images/imgActividades/";

$id_eve = $_GET['id_eve'];
$tipo = $_GET['tipo'];

$evento = $acti->regresa_nombre_evento($id_eve);
$imagen = BASEURL."views/images/imgEventos/" . $acti->regresa_img_evento($id_eve); 
$tip_act = $acti->regresa_tipos_actividad($id_eve);
$actividad = $acti->regresa_actividad($id_eve, $tipo);
?>
<script src=<?php echo BASEURL.'views/bootstrap/js/actividades.js'?>></script>

<?php if (isset($_SESSION['id_usuario'])) : ?>
    <?php if (isset($_POST['id_usuario'])) : ?>
        <?php $opc = $acti->registraUsuario_actividad($_POST)?>
            <script languaje="javascript">
                $(document).ready(function(){
                   modal_reg_act_usu(<?php echo $opc; ?>); 
                });  
            </script>
    <?php endif; ?>    
<?php endif; ?>
<div class="row-fluid">

    <div class="span11 padding">
        <div class="span11 ">  
                <h2> <?php echo "Bienvenido a " . $evento ?></h2>    
        </div>
    </div>

    <div class="row-fluid  span11">
        <div class="span3">
            <div class="">
                <?php if (isset($_SESSION['id_usuario'])): ?>
                    <?php include ('menuSecion.php'); ?>
                <?php else: ?>

                    <div class="well">
                        <ul class="nav nav-list">
                            <li><h5><?php echo "ACTIVIDADES"?></h5></li>
                            <?php foreach ($tip_act as $key => $value) : ?>
                            <li class="nav-header"><a href="actividades.php?id_eve=<?php echo $id_eve ?>&tipo=<?php echo $tip_act[$key]['id_tipo_actividad'] ?>"><span class="icon-hand-right"></span><?php echo $tip_act[$key]['tipo_actividad'] ?></a></li>
                                <?php $act = $acti->regresa_actividad($id_eve, $tip_act[$key]['id_tipo_actividad']) ?>
                                <?php foreach ($act as $key => $value) : ?>
                                    <li><span class="icon-ok-circle"></span><?php echo $act[$key]['nombre_actividad']?></li>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                <?php endif; ?>
            </div>
        </div>  

        <div class="span9 image">
            <img class="image" src="<?php echo $imagen ?>"/> 
        </div>

    </div><?php //cierre de row-fluid span11   ?>
    
    <div class="row-fluid">
        <div class="span10 offset1">
            <ul class="breadcrumb">
                <li class="active">Actividades >>>  </li>
                <?php foreach ($tip_act as $key => $value) : ?>
                    <li><span class="divider">|</span><a href="actividades.php?id_eve=<?php echo $id_eve ?>&tipo=<?php echo $tip_act[$key]['id_tipo_actividad'] ?>"><?php echo $tip_act[$key]['tipo_actividad'] ?></a></li>
                <?php endforeach; ?>
                <li><span class="divider">|</span><a href="actividades.php?id_eve=<?php echo $id_eve ?>&tipo=0">TODAS</a></li>
            </ul>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span10 offset1">
            <?php foreach ($actividad as $key => $value) : ?>

                <div class="accordion-group">
                    <?php if ($key % 2 == 1): ?>
                        <div class="accordion-heading color1 row-fluid">
                        <?php else : ?>
                            <div class="accordion-heading color row-fluid">
                            <?php endif; ?>

                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="<?php echo "#" . $actividad[$key]['id_actividad']; ?>">
                                <h4><?php echo $actividad[$key]['nombre_actividad'] ?><span class="divider icon-arrow-up"></span>
                                    <span class="divider icon-arrow-down"></span></h4></a>                 
                        </div>
                        <div id="<?php echo $actividad[$key]['id_actividad']; ?>" class="accordion-body collapse ">               

                            <div class="accordion-inner row-fluid">                    
                                <div class="span9">                        
                                    <p>
                                    <p> <?php echo "Descripcion : " . $actividad[$key]['descripcion'] ?> </p> 
                                    <p> <?php echo "Del " . $actividad[$key]['fecha_inicio'] . " al " . $actividad[$key]['fecha_fin'] ?> </p> 
                                    <p> <?php echo "Horarios de :" . $actividad[$key]['hora_inicio'] . " a " . $actividad[$key]['hora_fin'] ?> </p> 
                                    <p> <?php echo "Precio : $ " . $actividad[$key]['precio'] ?> </p> 
                                    <?php if (!isset($_SESSION['id_usuario'])): ?>  
                                    
                                        <td> <h5><a href="<?php echo BASEURL; ?>views/site/registro.php" > <h5><span class="label label-important">Registrate o inicia sesion para unirte al evento</span></h5><a></h5></td>
                                    <?php else : ?>
                                        <form  method="post">
                                            <input type="hidden" id="id_usuario" name="id_usuario" value=<?php echo $_SESSION['id_usuario'] ?>>
                                            <input type="hidden" id="id_actividad" name="id_actividad" value=<?php echo $actividad[$key]['id_actividad'] ?>>
                                            <input type="hidden" id="precio" name="precio" value=<?php echo $actividad[$key]['precio'] ?>>
                                            <input type="hidden" id="fecha_inicio" name="fecha_inicio" value=<?php echo $actividad[$key]['fecha_inicio'] ?>>
                                            <input type="hidden" id="fecha_fin" name="fecha_fin" value=<?php echo $actividad[$key]['fecha_fin'] ?>>
                                            <input type="hidden" id="hora_inicio" name="hora_inicio" value=<?php echo $actividad[$key]['hora_inicio'] ?>>
                                            <input type="hidden" id="hora_fin" name="hora_fin" value=<?php echo $actividad[$key]['hora_fin'] ?>>
                                            <input type="submit" class="btn-small btn-danger" value="Unete!!!">
                                        </form>
                                    <?php endif; ?>      
                                    </p>
                                </div>                    
                                <div class="span3 rojo">
                                    <img class="image2" src="<?php echo $ruta . $actividad[$key]['imagen'] ?>"/> 
                                </div>                    
                            </div>

                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <div id="modal_reg_act_usu" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="row">
                <h3><div class = "spann2" id = "mensaje1" ></div></h3>
            </div>
        </div>
    </div>
    
    
    
    <?php include('../layouts/footer.php');
    ?>

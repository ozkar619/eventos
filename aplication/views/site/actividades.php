<?php
session_start();
include ('../../models/Conexion.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../models/Modelo.php');
include ('../../models/Asistentes_Actividades.php');
include ('../../controllers/siteController/asistente_actividadedController.php');
include ('../layouts/header.php');

$acti = new asistente_actividadedController();
$ruta = "../images/imgActividades/";

$id_eve = $_GET['id_eve'];
$tipo = $_GET['tipo'];

$evento = $acti->regresa_nombre_evento($id_eve);
$imagen = "../images/imgEventos/" . $acti->regresa_img_evento($id_eve);
$tip_act = $acti->regresa_tipos_actividad($id_eve);
$actividad = $acti->regresa_actividad($id_eve, $tipo);
?>
<?php if (isset($_SESSION['id_usuario'])) : ?>
    <?php if (isset($_POST['id_usuario'])) : ?>
        <?php if ($acti->registraUsuario_actividad($_POST)) : ?>
            <?php // echo '<script>'; echo 'modal_reg_act_usu();';echo '</script>'; ?>
            <h5>REGISTRO CORRECTO</h5>
          <?php else: ?>   
            <h5>REGISTRO INCORRECTO/YA ESTAS REGISTRADO</h5>
        <?php endif; ?>  
    <?php endif; ?>    
<?php endif; ?>
<div class="row-fluid">

    <div class="span11 ">
        <div Class="span10">
            <div>
                <h2> <?php echo "Bienvenido a las actividades de " . $evento ?></h2>

            </div>

        </div>
    </div>

    <div class="row-fluid  span11">
        <div class="span3 rosa">
            <span class="label label-inverse large">Actividades</span>
            aqui se supone que va otra lista con cada uno de los
            tipos de actividad y cada con sus actividades de este evento
            <<<<<<<<<<"En construccion">>>>>>>>>>>  
        </div>

        <div class="span9 image  ">
            <img class="image" src="<?php echo $imagen ?>"/> 

        </div>

    </div>
    <div class="row-fluid ">
        <div class="span8 offset3">
            <ul class="breadcrumb">
                <li class="active">Actividades >>>  </li>
                <?php foreach ($tip_act as $key => $value) : ?>
                    <li><span class="divider">/</span><a href="actividades.php?id_eve=<?php echo $id_eve ?>&tipo=<?php echo $tip_act[$key]['id_tipo_actividad'] ?>"><?php echo $tip_act[$key]['tipo_actividad'] ?></a></li>
                <?php endforeach; ?>
                <li><span class="divider">/</span><a href="actividades.php?id_eve=<?php echo $id_eve ?>&tipo=0">TODAS</a></li>
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
                                <div class="span8">                        
                                    <p>
                                    <p> <?php echo "Descripcion : " . $actividad[$key]['descripcion'] ?> </p> 
                                    <p> <?php echo "Del " . $actividad[$key]['fecha_inicio'] . " al " . $actividad[$key]['fecha_fin'] ?> </p> 
                                    <p> <?php echo "Horarios de :" . $actividad[$key]['hora_inicio'] . " a " . $actividad[$key]['hora_fin'] ?> </p> 
                                    <p> <?php echo "Precio : $ " . $actividad[$key]['precio'] ?> </p> 
                                    <?php if (!isset($_SESSION['id_usuario'])): ?>  
                                        <td> <h5><span class="label label-important">Registrate o inicia sesion para unirte a la actividad</span></h5></td>
                                    <?php else : ?>
                                        <form  method="post">
                                            <input type="hidden" id="id_usuario" name="id_usuario" value=<?php echo $_SESSION['id_usuario'] ?>>
                                            <input type="hidden" id="id_actividad" name="id_actividad" value=<?php echo $actividad[$key]['id_actividad'] ?>>
                                            <input type="hidden" id="precio" name="precio" value=<?php echo $actividad[$key]['precio'] ?>>
                                            <input type="submit" class="btn-small btn-danger" value="Unete!!!">

                                        </form>
                                    <?php endif; ?>      
                                    </p>
                                </div>                    
                                <div class="span3 rojo">
                                    <img src="<?php echo $ruta . $actividad[$key]['imagen'] ?>"/> 
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
                <h1><div class = "spann2" id = "mensaje1" ></div></h1>
            </div>
        </div>
    </div>
    <?php include('../layouts/footer.php');
    ?>

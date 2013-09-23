<?php
session_start();
include ('../../models/Conexion.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../models/Modelo.php');
include ('../../models/Evento.php');
include ('../../controllers/siteController/inicioController.php');
include ('../layouts/header.php');

$inicio = new InicioControler();

$ruta = "../images/imgEventos/";
?>
<script src="../bootstrap/js/inicio.js"></script>

<div class="row-fluid">

    <div class="row spann12 padding2 fondo">
        <div class="padding">
            <?php if (!isset($_SESSION['id_usuario'])): ?>
                <div class="span4  well">
                    <h2>SEITC</h2>
                    <p class="justificado">Bienvenidos al Sistema de Eventos del Instituto Tecnológico de Celaya.
                        Aquí podrás revisar cada evento próximo o actual del ITC, y poder
                        registrarte a cada una de sus actividades.
                        Prueba esta nueva modalidad que el ITC tiene para ti.
                    </p>
                </div>
            <?php else : ?>
                <div class="span4">
                    <?php include ('menuSecion.php'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="span7">
            <div id = "myCarousel" class = "carousel slide">
                <div class = "carousel-inner">
                    <?php $arreglo = $inicio->muestra_eventos(4); ?>
                    <?php foreach ($arreglo as $key => $value) : ?>
                        <?php if ($key == 1): ?>
                            <div class = "item active"> 
                            <?php else: ?>
                                <div class = "item"> 
                                <?php endif; ?>
                                <a href="#"><img  src = "<?php echo $ruta . $arreglo[$key]['imagen'] ?>" alt = "" class="imgCarrousel image"></a>
                                <div class = "carousel-caption">
                                    <h3><p><?php echo $arreglo[$key]['nombre_evento'] ?></p></h3>
                                    <p> <?php echo "Descripcion : " . $arreglo[$key]['informacion'] ?> </p> 
                                    <p> <?php echo "Del " . $arreglo[$key]['fecha_inicio'] . " al " . $arreglo[$key]['fecha_fin'] ?> </p> 
                                    <p> <?php echo "Lugar : " . $arreglo[$key]['lugar'] . "____/____Contacto : " . $arreglo[$key]['contacto'] ?> </p>
                                    <tr>
                                        <td><a href="actividades.php?<?php echo 'id_eve=' . $arreglo[$key]['id_evento'] . '&tipo=0' ?>" role="button" class="btn btn-warning" data-toggle="modal" >Actividades »</a>  </td>               

                                        <?php if (!isset($_SESSION['id_usuario'])): ?>  
                                            <td> <h5><span class="label label-important">Registrate o inicia sesion para unirte al evento</span></h5></td>
                                        <?php endif ?> 
                                    </tr>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>
            </div>
        </div>
    </div> 




    <div>
        <H3 class="well"><span class="divider icon-arrow-down"></span>TODOS LOS EVENTOS<span class="divider icon-arrow-down"></span></H3>
    </div>


    <div class="padding spann12 ">
        <?php $arreglo = $inicio->muestra_eventos(); ?>
        <?php $control = 0; ?>
        <?php foreach ($arreglo as $key => $value) : ?> 
            <?php
            $nom = $arreglo[$key]['nombre_evento'];
            $f_i = $arreglo[$key]['fecha_inicio'];
            $f_f = $arreglo[$key]['fecha_fin'];
            $inf = $arreglo[$key]['informacion'];
            $lugar = $arreglo[$key]['lugar'];
            $cont = $arreglo[$key]['contacto']
            ?>
            <?php if ($control === 0): ?>
                <div class="row-fluid">
                <?php endif; ?>

                <div class="span4 padding">
                    <h5><?php echo $arreglo[$key]['nombre_evento'] ?></h5>
                    <img class="image2" src="<?php echo $ruta . $arreglo[$key]['imagen'] ?>"/> 
                    <?php $nom = $arreglo[$key]['nombre_evento']; ?>
                    <tr>
                        <td><a href="actividades.php?<?php echo 'id_eve=' . $arreglo[$key]['id_evento'] . '&tipo=0' ?>" role="button" class="btn btn-primary" data-toggle="modal" >Ver actividades »</a>  </td>               
                        <td><a role="button"  class="btn" data-toggle="modal" onclick="func_modal('<?php echo $nom ?>', '<?php echo $lugar ?>', '<?php echo $f_i ?>', '<?php echo $f_f ?>', '<?php echo $cont ?>', '<?php echo $inf ?>')" >Detalles »</a>  </td>             
                    </tr>
                </div>
                <?php $control++; ?>
                <?php if ($control === 3): ?>  
                    <?php $control = 0; ?>
                </div>
            <?php endif; ?>      
        <?php endforeach; ?>
    </div>
</div>

<div id="myModal" class="modal hide fade fondo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div class="row">
            <h1><div class = "spann2" id = "nombre" >       
                </div></h1>
            <div class = "spann2" id = "img" >              
            </div>
        </div>
    </div>
    <div class="modal-body">
        <p id="fecha"></p>
        <p id="lugar"></p>
        <p id="informacion"></p>
        <p id="contacto"></p>
    </div>

</div>
<?php include("../layouts/footer.php"); ?>







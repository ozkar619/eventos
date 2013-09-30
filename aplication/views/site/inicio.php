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
            </div>
            <div class="span7">
            <?php else : ?>
                <div class="span3">
                    <?php include ('menuSecion.php'); ?>
                </div>
            </div>
            <div class="span8">
            <?php endif; ?>
            <!--        </div>
                    <div class="span7">-->

            <!--<div class="bs-docs-example">-->
            <div id="myCarousel" class="carousel slide">
                <?php $arreglo = $inicio->muestra_eventos(4); ?>
                <ol class="carousel-indicators">
                    <?php foreach ($arreglo as $key => $value): ?>
                        <li data-target="#myCarousel" data-slide-to="<?php echo $key; ?>" class=""></li>
                    <?php endforeach; ?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ($arreglo as $key => $value) : ?>
                        <?php if ($key === 0): ?>
                            <div class="item active ">
                            <?php else: ?>
                                <div class="item ">
                                <?php endif; ?>
                                <img class="image" src="<?php echo BASEURL . "views/images/imgEventos/" . $arreglo[$key]['imagen']; ?>" alt="">
                                <div class="carousel-caption">
                                    <h4><?php echo $arreglo[$key]['nombre_evento']; ?></h4>
                                    <p> <?php echo "Descripcion : " . $arreglo[$key]['informacion']; ?> </p> 
                                    <p> <?php echo "Del " . $arreglo[$key]['fecha_inicio'] . " al " . $arreglo[$key]['fecha_fin']; ?> </p> 
                                    <p> <?php echo "Lugar : " . $arreglo[$key]['lugar']; ?> </p>
                                    <p><?php echo "Contacto : " . $arreglo[$key]['contacto']; ?></p>
                                    <table>
                                        <tr>
                                            <td> <a href="<?php echo BASEURL . "views/site/actividades.php?id_eve=" . $arreglo[$key]['id_evento'] . "&tipo=0"; ?>" role="button" class="btn btn-warning" data-toggle="modal" >Actividades »</a> </td> 
                                            <?php if (!isset($_SESSION['id_usuario'])): ?> 
                                                <td> <a href="<?php echo BASEURL . "views/site/registro.php" ?>"> <h5><span class="label label-important">Registrate o inicia sesion para unirte al evento</span></h5></a></td>
                                            <?php endif; ?>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        <?php endforeach; ?>

                    </div>

                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                </div>
            </div>
            <!--</div>-->
        </div> 




        <div>

            <H3 class="well"><span class="divider icon-arrow-down"></span>TODOS LOS EVENTOS<span class="divider icon-arrow-down"></span></H3>
        </div>


        <div class="padding spann12 ">
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
                        <img class="image2" src="<?php echo BASEURL . "views/images/imgEventos/" . $arreglo[$key]['imagen']; ?>" alt="">
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
            <div class="row padding">
                <h1 class="padding"><div class = "spann2" id = "nombre" >       
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







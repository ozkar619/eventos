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

$ruta = "../images/";
?>


<?php if (isset($_POST['btn'])): ?>
    <?php if (isset($_SESSION['id_usuario'])): ?>
        <?php if ($inicio->checa_registro($_SESSION['id_usuario'], $_POST['id_eve']) == 0): ?>
            <?php if ($inicio->registrar_a_evento($_SESSION['id_usuario'], $_POST['id_eve'])): ?>
                <h6><?php echo "INCRIPCION CORRECTA A \"" . $_POST['nom_eve'] . "\""; ?></h6>
            <?php endif; ?>
        <?php else: ?>
            <h6><?php echo "YA ESTAS INSCRITO EN  \"" . $_POST['nom_eve'] . "\""; ?></h6>
        <?php endif; ?> 
    <?php endif; ?>   
<?php endif; ?> 


<div class="row">
    <div class="row">
        <div class=" span4 offset1 justificado">
            <h3>Sistema de Eventos del ITC</h3>
            <h1>SEITC</h1>
            <p>En este sistema podrás encontrar eventos recientes y próximos
                del I.T.C así como el registro a cada uno de ellos y de sus actividades.
                Cuando te registres en SEITC tendras tu cuenta en la cual podrás
                consultar a los eventos y actividades en los que has participado.
            <h5>Participa en esta nueva modalidad que el I.T.C tiene para ti!!!!!!!</h5>
            </p>
        </div>  
        <div class=" span7 ">
            <div id = "myCarousel" class = "carousel slide span6">

                <div class = "carousel-inner">
                    <?php $arreglo = $inicio->muestra_eventos(5); ?>
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
                                    <form method="POST" action="#">
                                        <tr>
                                            <td> <input type="BUTTON" name="btn2" value="Ver actividades" class = "btn btn-danger"></td>

                                            <?php if (isset($_SESSION['id_usuario'])): ?>   
                                            <input type= "hidden" name="id_eve" value= "<?php echo $arreglo[$key]['id_evento'] ?>">
                                            <input type= "hidden" name="nom_eve" value= "<?php echo $arreglo[$key]['nombre_evento'] ?>">
                                            <td>  <input type="submit" name="btn" value="UNETE!!!!" class = "btn btn-warning"></td>
                                        <?php else : ?>
                                            <td> <h5><span class="label label-important">Registrate o inicia sesion para unirte al evento</span></h5></td>
                                        <?php endif ?> 
                                        </tr>
                                    </form>

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
    <div class="row">
        <div class="span6 offset1">
            <h1>Eventos recientes y próximos</h1>
        </div>    
    </div

    <div class="row">
        <div class="span11 ">

        </div>    
    </div>
    <?php include("../layouts/footer.php"); ?>


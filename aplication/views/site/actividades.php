<?php
session_start();
include ('../../models/Conexion.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../models/Modelo.php');
include ('../../models/Actividades.php');
include ('../../controllers/siteController/actividadesController.php');
include ('../layouts/header.php');

$acti = new Actividades();
$ruta = "../images/imgActividades/";
$id_eve = $_POST['id_eve'];
$evento = $_POST['nombre'];
$imagen = "../images/imgEventos/".$_POST['imagen'];
?>

<div class="rojo padding2 row-fluid">
    <div Class="span12">
      <h2> <?php echo $evento ?></h2>
    </div>
</div>

<div class="azul  row-fluid">
    <div class="span3 rosa">
        hl
    </div>

    <div class="span9    blanco image">
        <img class="image" src="<?php echo $imagen ?>"/> 
    </div>

</div>
<div class="row-fluid">
    <div class="span12 negro">
        h
    </div>
</div>


<?php include('../layouts/footer.php');
?>

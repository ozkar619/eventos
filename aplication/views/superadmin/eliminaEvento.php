<?php
session_start();
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Evento.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/superadminController/superadminController.php');

include("../layouts/header.php");
?>
<h1>&iquest;Est&aacute;s seguro de eliminar el evento <?php echo $_GET['id_evento'];?>?</h1>
<form method="POST">
    <input type="hidden" name="id_evento" value="<?php echo $_GET['id_evento'];?>"/>
    S&iacute;
    <input type="radio" name="confirm" value="si" checked="checked"/>
    No
    <input type="radio" name="confirm" value="no"/>
    <br/><input type="submit" value="Enviar"/>
</form>
<?php
if(isset($_POST['confirm'])){
    if($_POST['confirm']=="si"){
    $sacontroller=new SuperadminController();
    if($sacontroller->elimina_evento($_POST['id_evento'])){
        header("Location: eventossuperadmin.php");
    }
}else{
    header("Location: eventossuperadmin.php");
    }
}
?>
<?php
include("../layouts/footer.php");
?>
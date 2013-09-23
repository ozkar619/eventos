<?php
session_start();
if(!isset($_SESSION['superadmin']))
    header ("Location: ../site/inicio.php");
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Evento.php');
include ('../../models/Eventos_Admin.php');
include ('../../models/Actividades.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/superadminController/superadminController.php');

include("../layouts/header.php");
?>
<h1>&iquest;Est&aacute;s seguro de eliminar el evento <?php echo $_GET['id_evento'];?>?</h1>
<form method="POST">
    <!--<input type="hidden" name="id_evento" value=""/>
    S&iacute;
    <input type="radio" name="confirm" value="si" checked="checked"/>
    No
    <input type="radio" name="confirm" value="no"/>
    <br/><input type="submit" value="Enviar"/>-->
    <input type="hidden" name='id_evento' value="<?php echo $_GET['id_evento'];?>"/>
    <input type="submit" name='aceptar' value="S&iacute;"/>
    <input type="button" onclick="window.location.href='eventossuperadmin.php'" value='No'/>
</form>
<?php
if(isset($_POST['aceptar'])){
//    if($_POST['confirm']=="si"){
//    $sacontroller=new SuperadminController();
//    if($sacontroller->elimina_evento($_POST['id_evento'])){
//        header("Location: eventossuperadmin.php");
//    }
    $sacontroller=new SuperadminController();
    $sacontroller->elimina_evento_ad($_POST['id_evento']);
    $sacontroller->elimina_actividades_evento($_POST['id_evento']);
    $sacontroller->elimina_evento($_POST['id_evento']);
    header("Location: eventoEliminado.php");
}
?>
<?php
include("../layouts/footer.php");
?>
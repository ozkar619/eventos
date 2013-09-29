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
$id_evento=$_GET['id_evento'];
$sa=new SuperadminController();
$rows=$sa->obtener_nombre_evento($id_evento);
?>
<h3>&iquest;Est&aacute;s seguro de eliminar el evento <?php echo $rows[0]['nombre_evento'];?>?</h3>
<form method="POST">
    <input type="hidden" name='id_evento' value="<?php $id_evento;?>"/>
    <input type="submit" name='aceptar' value="S&iacute;"/>
    <input type="button" onclick="window.location.href='eventossuperadmin.php'" value='No'/>
</form>
<?php
if(isset($_POST['aceptar'])){
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
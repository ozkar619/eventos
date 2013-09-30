<?php
session_start();
if(!isset($_SESSION['superadmin']))
    header ("Location: ../site/inicio.php");
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Eventos_Admin.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/superadminController/superadminController.php');
include("../layouts/header.php");
$id_evento_admin=$_GET['id_evento_admin'];
$sa=new SuperadminController();
$rows=$sa->obtener_nombre_evento_usuario($id_evento_admin);
?>
<h3>&iquest;Est&aacute;s seguro de retirar al administrador <?php echo $rows[0]['nombre_asistente']." ".$rows[0]['apellido_paterno']; ?> del evento <?php echo $rows[0]['nombre_evento']; ?>?</h3>
<form method="POST">
    <input type="submit" name='aceptar' value="S&iacute;"/>
    <input type="button" onclick="window.location.href='adminssuperadmin.php'" value='No'/>
</form>
<?php
if(isset($_POST['aceptar'])){
    $sacontroller=new SuperadminController();
    $sacontroller->elimina_evento_admin($id_evento_admin);
    header("Location: adminssuperadmin.php");
}
?>
<?php
include("../layouts/footer.php");
?>
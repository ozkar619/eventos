<?php
session_start();
if(!isset($_SESSION['superadmin']))
    header ("Location: ../site/inicio.php");
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Tipo_Actividad.php');
include ('../../models/Actividades.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/superadminController/superadminController.php');
include("../layouts/header.php");
$id_tipo_actividad=$_GET['id_tipo_actividad'];
$sa=new SuperadminController();
$rows=$sa->obtener_nombre_tipo_actividad($id_tipo_actividad);
?>
<h3>&iquest;Est&aacute;s seguro de Eliminar el tipo de actividad "<?php echo $rows[0]['tipo_actividad']; ?>"</h3>
<form method="POST">
    <input type="submit" name='aceptar' value="S&iacute;"/>
    <input type="button" onclick="window.location.href='tiposactividadsuperadmin.php'" value='No'/>
</form>
<?php
if(isset($_POST['aceptar'])){
    $sacontroller=new SuperadminController();
    $sacontroller->elimina_actividad($id_tipo_actividad);
    $sacontroller->elimina_tipo_actividad($id_tipo_actividad);
    header("Location: tiposactividadsuperadmin.php");
}
?>
<?php
include("../layouts/footer.php");
?>
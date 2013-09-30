<?php
session_start();
if(!isset($_SESSION['superadmin']))
    header ("Location: ../site/inicio.php");
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Tipo_Usuario.php');
include ('../../models/Asistente_Tipo_Usuario.php');
include ('../../models/Eventos_Tipos_Usuarios.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/superadminController/superadminController.php');
include("../layouts/header.php");
$id_tipo_usuario=$_GET['id_tipo_usuario'];
$sa=new SuperadminController();
$rows=$sa->obtener_nombre_tipo_usuario($id_tipo_usuario);
?>
<h3>&iquest;Est&aacute;s seguro de Eliminar el tipo de usuario "<?php echo $rows[0]['tipo']; ?>"</h3>
<form method="POST">
    <input type="submit" name='aceptar' value="S&iacute;"/>
    <input type="button" onclick="window.location.href='tiposusuariosuperadmin.php'" value='No'/>
</form>
<?php
if(isset($_POST['aceptar'])){
    $sacontroller=new SuperadminController();
    $sacontroller->elimina_asistente_tipo_usuario($id_tipo_usuario);
    $sacontroller->elimina_evento_tipo_usuario($id_tipo_usuario);
    $sacontroller->elimina_tipo_usuario($id_tipo_usuario);
    header("Location: tiposusuariosuperadmin.php");
}
?>
<?php
include("../layouts/footer.php");
?>
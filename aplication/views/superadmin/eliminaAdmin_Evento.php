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
?>
<h1>&iquest;Est&aacute;s seguro de retirar al administrador del evento?</h1>
<form method="POST">
    <input type="hidden" name='id_evento_admin' value="<?php echo $_GET['id_evento_admin'];?>"/>
    <input type="submit" name='aceptar' value="S&iacute;"/>
    <input type="button" onclick="window.location.href='adminssuperadmin.php'" value='No'/>
</form>
<?php
if(isset($_POST['aceptar'])){
    $sacontroller=new SuperadminController();
    $sacontroller->elimina_evento_admin($_POST['id_evento_admin']);
    header("Location: adminssuperadmin.php");
}
?>
<?php
include("../layouts/footer.php");
?>
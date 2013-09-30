<?php
session_start();
if(!isset($_SESSION['superadmin']))
    header ("Location: ../site/inicio.php");
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Tipo_Usuario.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/superadminController/superadminController.php');
include("../layouts/header.php");
$id_tipo_usuario=$_GET['id_tipo_usuario'];
$sa=new SuperadminController();
$rows=$sa->obtener_nombre_tipo_usuario($id_tipo_usuario);
?>
<div class="container-fluid tabla">
    <div class="row-fluid">
        <div class="span12">
            <h3>Actualizar tipo de usuario</h3>
        </div>
    </div>
    <div class="row-fluid">
        <form method="post">
            <div class="span12">
                <input type="text" name="tipo" placeholder="<?php echo $rows[0]['tipo']; ?>" />
            </div>
                
            <div class="span12">
                <input type="submit" value="Actualizar"/>
            </div>
            
        </form>
    </div>
    <?php
    
    if(isset($_POST['tipo'])){
            $sa->actualiza_tipo_usuario($id_tipo_usuario, $_POST['tipo']);
            header("Location: tiposusuariosuperadmin.php");
    }
    ?>
    <?php
    
    include("../layouts/footer.php");
    ?>
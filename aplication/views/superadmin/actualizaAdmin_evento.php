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
$superadmin=new SuperadminController();
$rows1=$superadmin->obtener_nombre_evento_usuario($id_evento_admin);
?>
<div class="container-fluid tabla">
    <!--<div class="row-fluid">a</div>-->
    <div class="row-fluid">
        <div class="span12">
            <h3>Selecciona al nuevo administrador del evento <?php echo $rows1[0]['nombre_evento']; ?></h3>
        </div>
    </div>
    <div class="row-fluid">
        <form method="post">
            <div class="span3">
                
                <select name="id_asistente">
                    <option value="0">Selecciona un usuario</option>
                    
                    <?php
                    //$superadmin = new SuperadminController();
                    $rows = $superadmin->consulta_admins();
//                    print_r($rows);
                    if (count($rows) > 0) {
                        $num = count($rows);
                        $apuntador = 0;
                        while ($apuntador < $num) {
                            echo "<option value='" . $rows[$apuntador]['id_asistente'] . "'>" . $rows[$apuntador]['Nombre']." ".$rows[$apuntador]['Apellido'] . "</option>";
                            $apuntador++;
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="span3">
                <input type="submit" value="Asignar"/>
            </div>
        </form>
    </div>
    <?php
    $sa=new SuperadminController();
    if((isset($_POST['id_asistente']))&&($_POST['id_asistente']!=0)){
            $sa->actualiza_evento_admin($_POST['id_asistente'],$id_evento_admin);
            header("Location: adminssuperadmin.php");
    }
    ?>
    <?php
    
    include("../layouts/footer.php");
    ?>
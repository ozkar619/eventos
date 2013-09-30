<?php
session_start();
if(!isset($_SESSION['superadmin']))
    header ("Location: ../site/inicio.php");
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Asistente_Tipo_Usuario.php');
include ('../../models/Usuario.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/superadminController/registroAsistente_Tipo_UsuarioController.php');
include ('../../controllers/superadminController/superadminController.php');
include("../layouts/header.php");
$id_asistente=$_GET['id_asistente'];
$sa=new SuperadminController();
$rows1=$sa->obtener_nombre_asistente($id_asistente);
?>
<div class="container-fluid tabla">
    <!--<div class="row-fluid">a</div>-->
    <div class="row-fluid">
        <div class="span12">
            <h3>Usuario: <?php echo $rows1[0]['nombre_asistente']." ".$rows1[0]['apellido_paterno'] ?></h3>
        </div>
    </div>
    <div class="row-fluid">
        <form method="post">
            <div class="span3">
                <br/>
                <h4>Tipos de usuario asignados:</h4>
                <select name="id_tipo_usuario1">
                    <option value="0">Selecciona un tipo de usuario</option>
                    <?php
                    //$sa=new SuperadminController();
                    $rows = $sa->consulta_atus($id_asistente);
                    if (count($rows) > 0) {
                        $num = count($rows);
                        $apuntador = 0;
                        while ($apuntador < $num) {
                            echo "<option value='" . $rows[$apuntador]['id_tipo_usuario'] . "'>" . $rows[$apuntador]['tipo'] . "</option>";
                            $apuntador++;
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Eliminar"/>
            </div>
        </form>
        <div class="span1"></div>
        <form method="post">
            <div class="span3">
                <h4>Asignar tipos de usuario:</h4>
                <select name="id_tipo_usuario">
                    <option value="0">Selecciona un tipo de usuario</option>
                    <?php
                    $sa=new SuperadminController();
                    $rows = $sa->consulta_atu($id_asistente);
                    if (count($rows) > 0) {
                        $num = count($rows);
                        $apuntador = 0;
                        while ($apuntador < $num) {
                            echo "<option value='" . $rows[$apuntador]['id_tipo_usuario'] . "'>" . $rows[$apuntador]['tipo'] . "</option>";
                            $apuntador++;
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Asignar"/>
            </div>
                
        </form>
    </div>
    <?php
    $atu=new RegistroAsistente_Tipo_UsuarioController();
    if ((isset($_POST['id_tipo_usuario'])) && ($_POST['id_tipo_usuario'] != 0)){
        $_POST['id_asistente']=$id_asistente;
        if($atu->registraAsistente_Tipo_Usuario($_POST)){
            header("Location: registroAsistentesTiposUsuario.php?id_asistente=".$id_asistente);
            exit();
        }
    }
    ?>
    <?php
    $sa=new SuperadminController();
    if ((isset($_POST['id_tipo_usuario1'])) && ($_POST['id_tipo_usuario1'] != 0)){
        $sa->elimina_asistente_tipo_usuario($id_asistente, $_POST['id_tipo_usuario1']);
            header("Location: registroAsistentesTiposUsuario.php?id_asistente=".$id_asistente);
            exit();
    }
    ?>
    <?php
    
    include("../layouts/footer.php");
    ?>
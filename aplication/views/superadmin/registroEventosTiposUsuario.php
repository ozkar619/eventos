<?php
session_start();
if(!isset($_SESSION['superadmin']))
    header ("Location: ../site/inicio.php");
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Evento.php');
include ('../../models/Eventos_Tipos_Usuarios.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/superadminController/registroEvento_Tipo_UsuarioController.php');
include ('../../controllers/superadminController/superadminController.php');
include("../layouts/header.php");
$id_evento=$_GET['id_evento'];
$sa=new SuperadminController();
$rows1=$sa->obtener_nombre_evento($id_evento);
?>
<div class="container-fluid tabla">
    <!--<div class="row-fluid">a</div>-->
    <div class="row-fluid">
        <div class="span12">
            <h3>Evento: <?php echo $rows1[0]['nombre_evento'] ?></h3>
        </div>
    </div>
    <div class="row-fluid">
        <form method="post">
            <div class="span3">
                <br/>
                <h4>Tipos de usuario asignados al evento:</h4>
                <select name="id_tipo_usuario1">
                    <option value="0">Selecciona un tipo de usuario</option>
                    <?php
                    //$sa=new SuperadminController();
                    $rows = $sa->consulta_etus($id_evento);
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
                <h4>Asignar tipos de usuario al evento:</h4>
                <select name="id_tipo_usuario">
                    <option value="0">Selecciona un tipo de usuario</option>
                    <?php
                    $sa=new SuperadminController();
                    $rows = $sa->consulta_etu($id_evento);
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
    $etu=new RegistroEvento_Tipo_UsuarioController();
    if ((isset($_POST['id_tipo_usuario'])) && ($_POST['id_tipo_usuario'] != 0)){
        $_POST['id_evento']=$id_evento;
        if($etu->registraEvento_Tipo_Usuario($_POST)){
            header("Location: registroEventosTiposUsuario.php?id_evento=".$id_evento);
            exit();
        }
    }
    ?>
    <?php
    $sa=new SuperadminController();
    if ((isset($_POST['id_tipo_usuario1'])) && ($_POST['id_tipo_usuario1'] != 0)){
        $sa->elimina_evento_tipo_usuario($_POST['id_tipo_usuario1'],$id_evento);
            header("Location: registroEventosTiposUsuario.php?id_evento=".$id_evento);
            exit();
    }
    ?>
    <?php
    
    include("../layouts/footer.php");
    ?>
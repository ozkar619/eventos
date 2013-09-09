<?php
session_start();
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Asistente_Tipo_Usuario.php');
include ('../../models/Tipo_Usuario.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/superadminController/registroAsistente_Tipo_UsuarioController.php');
include ('../../controllers/superadminController/registroTipo_UsuarioController.php');
include("../layouts/header.php");
?>
<div class="container-fluid tabla">
    <div class="row-fluid">a</div>
    <div class="row-fluid">
        <div class="span12">
            Usuario: <?php echo $_POST['id_asistente'] ?>
        </div>
    </div>
    <div class="row-fluid">
        <form method="post">
            <div class="span3">
                <input name="id_asistente" type="hidden" value="<?php echo $_POST['id_asistente'] ?>"/>
                <select name="id_tipo_usuario">
                    <option value="0">Selecciona un tipo de usuario</option>
                    <?php
                    $tu = new Tipo_Usuario();
                    $rs = $tu->consulta_datos();
                    $rows = $rs->GetArray();
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
            </div>
            <div class="span3">
                <input type="submit" value="Asignar"/>
            </div>
        </form>
    </div>
    <?php
    $atu=new RegistroAsistente_Tipo_UsuarioController();
    if ((isset($_POST['id_tipo_usuario'])) && ($_POST['id_tipo_usuario'] != 0)){
        if($atu->registraAsistente_Tipo_Usuario($_POST)){
            header("Location: registroCorrecto.php");
            exit();
        }
    }
    ?>
    <?php
    
    include("../layouts/footer.php");
    ?>
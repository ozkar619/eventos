<?php // ADMINISTRADOR
session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/eventos/aplication/config.ini.php';
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/adminController/adminController.php');
include ('../../controllers/adminController/actualizaController.php');
//include ('../layouts/header.php');

$actualiza = new ActualizaController();

$id_evento = $_GET['evt'];
$id_asistente_evento = $_GET['aev'];
$id_actividad = $_GET['act'];
$id_asistente = $_GET['asis'];
$stt = $_GET['stt'];

$idArrays = array(
    'id_asistente_evento' => $id_asistente_evento,
    'id_actividad' => $id_actividad,
    'id_asistente' => $id_asistente
);

$identificador = $_GET['id'];

if ($identificador == "pago") {
    $var = "pago";

    if ($stt == 0) {
        $stt = 1;
        $actualiza->actualiza_asistentes_actividades($var, $stt, $idArrays);
        header("Location:" . BASEURL . "views/admin/UsuariosAct.php?evt=" . $id_evento . "&act=" . $id_actividad);
        echo "Exito Si Pago";
        exit();
    } else {
        $stt = 0;
        $actualiza->actualiza_asistentes_actividades($var, $stt, $idArrays);
        header("Location:" . BASEURL . "views/admin/UsuariosAct.php?evt=" . $id_evento . "&act=" . $id_actividad);
        echo "Exito No Pago";
        exit();
    }
} elseif ($identificador == "asistio") {
    $var = "asistio";

    if ($stt == 0) {
        $stt = 1;
        $actualiza->actualiza_asistentes_actividades($var, $stt, $idArrays);
        header("Location:" . BASEURL . "views/admin/UsuariosAct.php?evt=" . $id_evento . "&act=" . $id_actividad);
        echo "Exito Si Asistio";
        exit();
    } else {
        $stt = 0;
        $actualiza->actualiza_asistentes_actividades($var, $stt, $idArrays);
        header("Location:" . BASEURL . "views/admin/UsuariosAct.php?evt=" . $id_evento . "&act=" . $id_actividad);
        echo "Exito No Asistio";
        exit();
    }
}





#--
//include ('../layouts/footer.php');
?>




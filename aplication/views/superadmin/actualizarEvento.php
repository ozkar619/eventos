<?php
session_start();
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Evento.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/superadminController/superadminController.php');
include ('../../controllers/superadminController/actualizaEvtController.php');

$id_evento = ($_GET['id_evento']); // <- Mandar el id del evento para agregar en la tabla
$eventos = new SuperadminController();
$arreglo = $eventos->edita_evento($id_evento);


$datosActividades = array(
    'nombre_evento' => $arreglo[0]['nombre_evento'],
    'lugar' => $arreglo[0]['lugar'],
    'contacto' => $arreglo[0]['contacto'],
    'fecha_inicio' => $arreglo[0]['fecha_inicio'],
    'fecha_fin' => $arreglo[0]['fecha_fin'],
    'informacion' => $arreglo[0]['informacion'],
    'imagen' => $arreglo[0]['imagen'],
);


//libreria del formulario ----------------------------
require '../../libs/zebra_form/Zebra_Form.php';
//definimos el formulario ----------------------------
$form = new Zebra_Form('form', 'POST', '', array());
$form->language('espanol');
$form->auto_fill($datosActividades);



//----------------------------------Comienza Form---------------------------------------//
# nombre_evento
$form->add('label', 'label_nombre_evento', 'nombre_evento', 'Nombre del Evento: ');
$obj = $form->add('text', 'nombre_evento');
$obj->set_rule(array(
    'required' => array('error', 'Nombre del Evento es requerido!'),
));

# Lugar
$form->add('label', 'label_lugar', 'lugar', 'Lugar: ');
$obj = $form->add('text', 'lugar');
$obj->set_rule(array(
    'required' => array('error', 'Lugar es requerido!'),
));

# Contacto
$form->add('label', 'label_contacto', 'contacto', 'Contacto:');
$obj = $form->add('text', 'contacto');
$obj->set_rule(array(
    'required' => array('error', 'Contacto es requerido!'),
));

# Fecha Inicio
$form->add('label', 'label_fecha_inicio', 'fecha_inicio', 'Fecha Inicio');
$obj = $form->add('date', 'fecha_inicio');
$obj->set_rule(array(
    'required' => array('error', 'Date is required!'),
    'date' => array('error', 'Date is invalid!'),
));
$obj->format('Y-m-d');
$obj->direction(1);
$form->add('note', 'note_fecha_inicio', 'fecha_inicio', 'Formato de Fecha (M, D, Y)');

# Fecha fin
$form->add('label', 'label_fecha_fin', 'fecha_fin', 'Fecha Fin');
$obj = $form->add('date', 'fecha_fin');
$obj->set_rule(array(
    'required' => array('error', 'Date is required!'),
    'date' => array('error', 'Date is invalid!'),
));
$obj->format('Y-m-d');
$obj->direction(1);
$form->add('note', 'note_fecha_fin', 'fecha_fin', 'Formato de Fecha (Y, M, d)');

# Descripcion
$form->add('label', 'label_informacion', 'informacion', 'Descripcion:');
$obj = $form->add('textarea', 'informacion');
$obj->set_rule(array(
    'required' => array('error', 'Descripcion es requerido!')
));

//imagen
$_SESSION['nombre_img'] = md5(rand(0, 500));
$form->add('label', 'label_file', 'file', 'Sube una imagen para el evento');
$obj = $form->add('file', 'file');
$obj->set_rule(array(
    'upload' => array('../images/imgEventos', $_SESSION['nombre_img'], 'error', 'Could not upload file!<br>Check that the "tmp" folder exists inside the "examples" folder and that it is writable'),
    'image' => array('error', 'File must be a jpg, png or gif image!'),
    'filesize' => array(102400, 'error', 'File size must not exceed 100Kb!'),
));


// "submit"

$form->add('submit', 'btnsubmit', 'Actualizar');

//----------------------------------Termina Form---------------------------------------//
//validamos el formulario -------------------------------
if ($form->validate()) {
    $actEventos = new ActualizaEvtController();
    if (isset($_POST)) {
         $_POST['imagen']=$_SESSION['nombre_img'].$_FILES['file']['name'];
        if ($actEventos->actualiza_eventos($_POST, $id_evento)) {
            header("Location: eventossuperadmin.php");

            exit();
        }
    }
}
//-------------------------------------------------------



include("../layouts/header.php");
?>
<link rel="stylesheet" href="../../libs/zebra_form/public/css/zebra_form.css">
<script src="../../libs/zebra_form/public/javascript/zebra_form.js"></script>

<div class="span6 offset3">
    <h2>Actualizacion de Eventos.</h2>
<?php
$form->render();
?>
    <a href="eventossuperadmin.php">Cancelar</a>
</div>

<?php
include("../layouts/footer.php");
?>

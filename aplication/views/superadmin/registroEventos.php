<?php
session_start();
if(!isset($_SESSION['superadmin']))
    header ("Location: ../site/inicio.php");
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Evento.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/superadminController/registroEvtController.php');


//libreria del formulario ----------------------------
require '../../libs/zebra_form/Zebra_Form.php';
//definimos el formulario ----------------------------
$form = new Zebra_Form('form', 'POST', '', array());
$form->language('espanol');

//nombre de evento
$form->add('label', 'label_nombre_evento', 'nombre_evento', 'Nombre del Evento:');
$obj = $form->add('text', 'nombre_evento');
$obj->set_rule(array(
    'required' => array('error', 'Nombre del evento es requerido!'),
));

//contacto
$form->add('label', 'label_contacto', 'contacto', 'Contacto:');
$obj = $form->add('text', 'contacto');
$obj->set_rule(array(
    'required' => array('error', 'Contacto es requerido!'),
));

//lugar
$form->add('label', 'label_lugar', 'lugar', 'Lugar:');
$obj = $form->add('text', 'lugar');
$obj->set_rule(array(
    'required' => array('error', 'Lugar es requerido!'),
));

//informacion
$form->add('label', 'label_informacion', 'informacion', 'Informaci&oacute;n:');
$obj = $form->add('text', 'informacion');
$obj->set_rule(array(
    'required' => array('error', 'Informaci&oacute;n es requerido!'),
));

//fecha de inicio
$form->add('label', 'label_fecha_inicio', 'fecha_inicio', 'Fecha de inicio:');
$obj = $form->add('date', 'fecha_inicio');
$obj->set_rule(array(
    'required' => array('error', 'Fecha de inicio es requerido'),
    'date' => array('error', 'Fecha inv&aacute;lida'),
));
$obj->format('Y-m-d');
$obj->direction(1);
$obj->pair('fecha_fin');
$form->add('note', 'note_fecha_inicio', 'fecha_inicio', 'Formato de Fecha (AAAA-MM-DD)');

//fecha de fin
$form->add('label', 'label_fecha_fin', 'fecha_fin', 'Fecha de fin:');
$obj = $form->add('date', 'fecha_fin');
$obj->set_rule(array(
    'required' => array('error', 'Fecha de fin es requerido'),
    'date' => array('error', 'Fecha inv&aacute;lida'),
));
$obj->format('Y-m-d');
$obj->direction(true);
$form->add('note', 'note_fecha_fin', 'fecha_fin', 'Formato de Fecha (AAAA-MM-DD)');

//imagen
$_SESSION['nombre_img']=md5(rand(0, 500));
$form->add('label', 'label_file', 'file', 'Sube una imagen para el evento');
$obj = $form->add('file', 'file');
$obj->set_rule(array(
    'upload' => array('../images/imgEventos', $_SESSION['nombre_img'], 'error', 'Could not upload file!'),
    'image' => array('error', 'File must be a jpg, png or gif image!'),
    'filesize' => array(1024000, 'error', 'File size must not exceed 1000Kb!'),
));

//submit
$form->add('submit', 'btnsubmit', 'Registrar');  


// echo "<PRE>";
//                    print_r($_POST);
//                    print_r($_FILES);
//                    echo "</PRE>";
//                    die();

//validar el formulario
if ($form->validate()){
                $evento = new RegistroEvtController;
                if(isset($_POST)){
                   $_POST['imagen']=$_SESSION['nombre_img'].$_FILES['file']['name'];
                   //move_uploaded_file($_FILES["file"]["tmp_name"],"../images/".$_FILES['file']['name']);
                   
                       if($evento->registraEvento($_POST)){
                        header("Location: registroCorrecto.php");
                        exit();
                    }
                   
                }
        } 
        include("../layouts/header.php"); 
       
?>
    <link rel="stylesheet" href="../../libs/zebra_form/public/css/zebra_form.css">

    <script src="../../libs/zebra_form/public/javascript/zebra_form.js"></script>


    <div class="span6 offset3">
        <h2>Registro de eventos.</h2>
        
        <?php
             $form->render();
        ?>
    </div>

    <?php
    include("../layouts/footer.php"); 
    ?>
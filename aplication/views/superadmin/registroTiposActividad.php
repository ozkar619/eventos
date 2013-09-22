<?php
session_start();
if(!isset($_SESSION['superadmin']))
    header ("Location: ../site/inicio.php");
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Tipo_Actividad.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/superadminController/registroTipo_ActividadController.php');


//libreria del formulario ----------------------------
require '../../libs/zebra_form/Zebra_Form.php';
//definimos el formulario ----------------------------
$form = new Zebra_Form('form', 'POST', '', array());
$form->language('espanol');

//tipo de actividad
$form->add('label', 'label_tipo_actividad', 'tipo_actividad', 'Tipo de Actividad:');
$obj = $form->add('text', 'tipo_actividad');
$obj->set_rule(array(
    'required' => array('error', 'Tipo es requerido!'),
));

//submit
$form->add('submit', 'btnsubmit', 'Registrar');  

//validar el formulario
if ($form->validate()){
                $ta = new RegistroTipo_ActividadController();
                if(isset($_POST)){
                    if($ta->registraTipo_Actividad($_POST)){
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
        <h2>Registro de tipos de actividad.</h2>
        
        <?php
             $form->render();
        ?>
    </div>

    <?php
    include("../layouts/footer.php"); 
    ?>
<?php
session_start();
include ('../../models/Conexion.php');
include ('../../models/Modelo.php');
include ('../../models/Tipo_Usuario.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../controllers/superadminController/registroTipo_UsuarioController.php');


//libreria del formulario ----------------------------
require '../../libs/zebra_form/Zebra_Form.php';
//definimos el formulario ----------------------------
$form = new Zebra_Form('form', 'POST', '', array());
$form->language('espanol');

//tipo de usuario
$form->add('label', 'label_tipo', 'tipo', 'Tipo de usuario:');
$obj = $form->add('text', 'tipo');
$obj->set_rule(array(
    'required' => array('error', 'Tipo es requerido!'),
));

//submit
$form->add('submit', 'btnsubmit', 'Registrar');  

//validar el formulario
if ($form->validate()){
                $tu = new RegistroTipo_UsuarioController;
                if(isset($_POST)){
                    if($tu->registraTipo_Usuario($_POST)){
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
        <h2>Registro de tipos de usuario.</h2>
        
        <?php
             $form->render();
        ?>
    </div>

    <?php
    include("../layouts/footer.php"); 
    ?>
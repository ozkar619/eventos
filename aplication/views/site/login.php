<?php
session_start();

    include ('../../models/Valida.php');
    include ('../../models/Modelo.php');
    include ('../../models/Usuario.php');
    include ('../../libs/adodb5/adodb-pager.inc.php');
    include ('../../libs/adodb5/adodb.inc.php');
    include ('../../controllers/siteController/loginController.php');
        
    require '../../libs/zebra_form/Zebra_Form.php';
    
    
    
    include("../layouts/header.php"); 
?>

<!-- load Zebra_Form's stylesheet file -->
<!--
<link rel="stylesheet" href="../../libs/zebra_form/public/css/zebra_form.css">
-->
<!-- load Zebra_Form's JavaScript file -->
<script src="../../libs/zebra_form/public/javascript/zebra_form.js"></script>


<div class="hero-unit span4">
  
  
    <h2>Iniciar Sesion</h2>

<?php          
    
    // instantiate a Zebra_Form object
    $form = new Zebra_Form('form');
    // the label for the "email" element
    $form->add('label', 'label_email', 'email', 'Email');
    // add the "email" element
    $obj = $form->add('text', 'email', '', array('autocomplete' => 'off'));
    // set rules
    $obj->set_rule(array(
        // error messages will be sent to a variable called "error", usable in custom templates
        'required'  =>  array('error', 'Email es requerido!'),
        'email'     =>  array('error', 'Email address seems to be invalid!'),
    ));
    // "password"
    $form->add('label', 'label_password', 'password', 'Password');
    $obj = $form->add('password', 'password', '', array('autocomplete' => 'off'));
    $obj->set_rule(array(
        'required'  => array('error', 'Password is required!'),
        'length'    => array(3, 10, 'error', 'The password must have between 6 and 10 characters!'),
    ));

//    // "remember me"
//    $form->add('checkbox', 'remember_me', 'yes');
//    $form->add('label', 'label_remember_me_yes', 'remember_me_yes', 'Remember me', array('style' => 'font-weight:normal'));

    // "submit"
    $form->add('submit', 'btnsubmit', 'Iniciar sesion');
    
    // if the form is valid
    if ($form->validate()) {
        if(isset($_POST['email'])){
            $login = new LoginController();
            if(!$login->valida_usuario($_POST['email'], $_POST['password'])){
                $form->render();
            }
        }
    }else
        $form->render();
?>
    </div>
    
<?php    
include("../layouts/footer.php"); 
?>

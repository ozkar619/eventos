<?php
    include ('../../models/Valida.php');
    include ('../../models/Modelo.php');
    include ('../../models/Usuario.php');
    include ('../../libs/adodb5/adodb-pager.inc.php');
    include ('../../libs/adodb5/adodb.inc.php');
    include ('../../controllers/siteController/registroController.php');
    
    //libreria del formulario ----------------------------
        require '../../libs/zebra_form/Zebra_Form.php';
    //definimos el formulario ----------------------------
        $form = new Zebra_Form('form','POST','',array());
        $form->language('espanol');

        $form->add('label', 'label_nombre', 'nombre', 'Nombre:');
        $obj = $form->add('text', 'nombre');
        $obj->set_rule(array(
            'required'  =>  array('error', 'Nombre es requerido!'),
        ));
            
        $form->add('label', 'label_apellido_paterno', 'apellido_paterno', 'Apellido Paterno:');
        $obj = $form->add('text', 'apellido_paterno');
        $obj->set_rule(array(
            'required' => array('error', 'Apellido es requerido!')
        ));
        
        $form->add('label', 'label_apellido_materno', 'apellido_materno', 'Apellido Materno:');
        $obj = $form->add('text', 'apellido_materno');
        $obj->set_rule(array(
            'required' => array('error', 'Apellido es requerido!')
        ));
        
        $form->add('label', 'label_sexo', 'sexo', 'Sexo:');
        $obj = $form->add('text', 'sexo');
        $obj->set_rule(array(
            'required' => array('error', 'Sexo es requerido!')
        ));
        
        $form->add('label', 'label_edad', 'edad', 'Edad:');
        $obj = $form->add('text', 'edad');
        $obj->set_rule(array(
            'required' => array('error', 'Edad es requerido!')
        ));
        $form->add('label', 'label_email', 'email', 'Email:');
        $obj = $form->add('text', 'email');
        $obj->set_rule(array(
            'required'  => array('error', 'Email is requerido!'),
            'email'     => array('error', 'Email no valido!')
        ));
        
        $form->add('note', 'note_email', 'email', 'mensajjjjjjje', 
                array('style'=>''));
        
        $form->add('label', 'label_password', 'password', 'Contraseña:');
        $obj = $form->add('password', 'password');
        $obj->set_rule(array(
            'required'  => array('error', 'Contraseña es requerido!'),
            'length'    => array(6, 10, 'error', 'Contraseña debe ser entre 6 y 10 caracteres.'),
        ));
        $form->add('note', 'note_password', 'password', 'Contraseña debe ser entre 6 y 10 caracteres.');

        // "captcha"
        $form->add('captcha', 'captcha_image', 'captcha_code');
        $form->add('label', 'label_captcha_code', 'captcha_code', 'Eres humano?');
        $obj = $form->add('text', 'captcha_code');
        $form->add('note', 'note_captcha', 'captcha_code', '....', array('style'=>'width: 200px'));
        $obj->set_rule(array(
            'required'  => array('error', 'Escribe los caracteres de la imagen!'),
            'captcha'   => array('error', 'Caracteres incorrectos!')
        ));

        // "submit"
        $form->add('submit', 'btnsubmit', 'Registrar');      
    
    //validamos el formulario -------------------------------
        if ($form->validate()){
                $usuario = new RegistroController();
                if(isset($_POST)){
                    if($usuario->registraUsuario($_POST)){
                        header("Location: registroCorrecto.php");
                        exit();
                    }
                }
        } 
        include("../layouts/header.php"); 
       
?>
    <!-- load Zebra_Form's stylesheet file -->
    <link rel="stylesheet" href="../../libs/zebra_form/public/css/zebra_form.css">
    <!-- load Zebra_Form's JavaScript file -->
    <script src="../../libs/zebra_form/public/javascript/zebra_form.js"></script>


    <div class="span6">
        <h2>Registro de asistentes.</h2>
        <?php
             $form->render();
        ?>
    </div>

    <?php
    include("../layouts/footer.php"); 
    ?>

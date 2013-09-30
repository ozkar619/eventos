<?php
    include ('../../models/Conexion.php');
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

            
        $form->add('label', 'label_nctr_rfc', 'nctr_rfc', 'Número de control o RFC:');
        $obj = $form->add('text', 'nctr_rfc');
        $obj->set_rule(array(
            'required'  =>  array('error', 'Número de control o RFC es requerido!'),
        ));
            
              
        
        $form->add('label', 'label_email', 'email', 'Email:');
        $obj = $form->add('text', 'email');
        $obj->set_rule(array(
            'required'  => array('error', 'Email is requerido!'),
            'email'     => array('error', 'Email no valido!')
        ));
        
        $form->add('note', 'note_email', 'email', '', 
                array('style'=>''));
        
     
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
                    }else{
                        $errores = true;
                       
                    }
                }
        } 
        include("../layouts/header.php"); 
       
?>
    <link rel="stylesheet" href="../../libs/zebra_form/public/css/zebra_form.css">

    <script src="../../libs/zebra_form/public/javascript/zebra_form.js"></script>

<hr />
        
    <div class="span6 offset1 " id="formReg">
        <img  width="50"
                      src="../images/logo_tecno.png" 
                      class="img-circle border-radius">
        <legend>Registro de usuario Interno</legend>
        <?php
             if(isset($errores))
                foreach ($usuario->errores as $value) {
                               echo '
                                   <div class="alert alert-error">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        '.$value.'
                                           
                                   </div>
                                 ';
                }
             $form->render();
        ?>
    </div>

    <?php
    include("../layouts/footer.php"); 
    ?>

    
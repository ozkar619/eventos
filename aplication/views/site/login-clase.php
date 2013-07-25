<?php
session_start();

    include ('../../models/Valida.php');
    include ('../../models/Modelo.php');
    include ('../../models/Usuario.php');
    include ('../../libs/adodb5/adodb-pager.inc.php');
    include ('../../libs/adodb5/adodb.inc.php');
    include ('../../controllers/siteController/loginController.php');
    
    
    if(isset($_POST['email'])){
        
        $login = new LoginController();
        $login->valida_usuario($_POST['email'], $_POST['password']);
    }
    
    
    
    include("../layouts/header.php"); 
?>     

<form class="form-inline" method="POST" action="">
                <div class="span12"> 
                    <label class="label-info span12 centro"><h3> LOGIN</h3></label>
                </div>
            <div class="row"> 
                <div class="span9 offset1">
                    <label for ="email" class="label">Usuario</label>
                    <input id="email" name="email" type="email" placeholder="email" class="input-xlarge">
                </div>
            </div>
            <div class="row"> 
                <div class="span9 "> 
                     <label for="password" class="label">Contrasena</label>
                    <input id= "password" name="password" type="password" class="input-xlarge">
                </div>
            </div>

           


            <div class="row-fluid"> 
                <div class="offset8">      
                    <input type="submit" value="Iniciar sesion" class="btn btn-danger" />
                </div>        
            </div>


        </form>

    <?php
    include("../layouts/footer.php"); 
    ?>

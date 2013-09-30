<?php
    include ('../../models/Conexion.php');
    include ('../../models/Modelo.php');
    include ('../../models/Usuario.php');
    include ('../../libs/adodb5/adodb-pager.inc.php');
    include ('../../libs/adodb5/adodb.inc.php');
    include ('../../controllers/siteController/registroController.php');
        
    include("../layouts/header.php"); 
       
?>
  

<hr />

    <div class="span8 offset1 form-actions">
        
            <fieldset>
            <legend>¿Eres estudiante, empleado o egresado del ITC? </legend>
            
            <a class="btn btn-primary" href="registroInterno.php">Si</a>
                     
                
            <a class="btn btn-warning" href="registroExterno.php">No</a> 
            </fieldset>
      
        
        <hr>
            <a href="registroInterno.php" >
                <img  width="50"
                      src="../images/logo_tecno.png" 
                      class="img-circle border-radius">
            </a>
        
        <a href="registroExterno.php" >
                <img  width="80"
                      src="../images/foraneo.jpg" 
                      class="img-circle border-radius">
            </a>
        
        
    </div>
    
  

    <?php
    include("../layouts/footer.php"); 
    ?>

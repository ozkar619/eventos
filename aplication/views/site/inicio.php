<?php
session_start();
include("../layouts/header.php"); 
?>
        <br>
        <pre>
        <?php 
            print_r($_SESSION);
        ?>
        </pre>
        <?php
            if(isset( $_SESSION['id_usuario'] )):
        ?>        
            <!--<h2>Bienvenido al sistema de eventos. <?php // echo $_SESSION['email'];?></h2>-->
            <?php        
            // Si inicia session un Admin redirecciona al menu de Administrador
            if(isset($_SESSION['admin'])){
                # Redirecciona al Inicio del Administrador
                header("Location: ../admin/initAdmin.php");            
            } else { 
                //Si no es un admin entra la UI del Usuario
                echo 'Bienvenido al Sistema de Eventos ' .$_SESSION['email'];
            }
            ?>
        <?php        
            endif;
        ?>
	<h3>Bienvenido al sistema de eventos. </h3>

<?php
include("../layouts/footer.php"); 
?>
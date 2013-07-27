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
            <h2>Bienvenido al sistema de eventos. <?php echo $_SESSION['email'];?></h2>
        <?php        
            endif;
        ?>
	<h3>Bienvenido al sistema de eventos. </h3>

<?php
include("../layouts/footer.php"); 
?>
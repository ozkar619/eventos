

<?php
    include ('../../models/Valida.php');
    include ('../../models/Modelo.php');
    include ('../../models/Usuario.php');
    include ('../../libs/adodb5/adodb-pager.inc.php');
    include ('../../libs/adodb5/adodb.inc.php');
    include ('../../controllers/adminController/adminController.php');

    $admin = new adminController();

include("../layouts/header.php"); 
?>

<script>
    $(document).ready(function() {
        $('#example').dataTable( {
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": ".Administrador./server_side/scripts/server_processing.php"
        } );
    } );
</script>

<div class="span12">
  
    <h2>lista de usuarios.</h2>
    <div class="btn-group">
        <button class="btn">Crear usuario</button>
        <button class="btn">Imprimir</button>
        
    </div>
    
    <?php 
        $admin->lista_usuarios();
    ?>


</div>
   


<?php
include("../layouts/footer.php"); 
?>

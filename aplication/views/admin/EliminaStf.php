<?php session_start();
    include ('../../models/Conexion.php');
    include ('../../models/Modelo.php');
    include ('../../libs/adodb5/adodb-pager.inc.php');
    include ('../../libs/adodb5/adodb.inc.php');
    include ('../../controllers/adminController/adminController.php');
    include ('../layouts/header.php');    
    
    $id_asistente_tipo_usuario = $_GET['atu'];
    $id_evento = $_GET['evt'];    
    $nombre_asistente = $_GET['usr'];
    
    ?>

<br/><br/>
<div class="hero-unit">
    <legend><strong>¿ Relamente Deseas Eliminar del Staff a este Usuario ?</strong></legend>
    
    <form method="POST">
        <input type="radio" name="confirm" value="si" checked="checked"/> [ <strong><?php echo $nombre_asistente ?> </strong>]        
        <br/><br/><input class="btn btn-large btn-success" type="submit" value="Si, Eliminar"/>
        <a href="<?php echo "staff?evt=$id_evento"?>" class="btn btn-large btn-primary" type="button" > No, Regresar </a>
    </form>  

    
    <?php if ((isset($_POST['confirm'])) && ($_POST['confirm']=="si") ) {
        $admin = new AdminController();    
        $admin->elimina("evt_eventos_tipos_usuarios", "id_asistente_tipo_usuario =".$id_asistente_tipo_usuario." AND id_evento =". $id_evento);
        echo 'Eliminado Correctamente<br/>';
        ?> <a href="<?php echo "staff.php?evt=$id_evento"?>" type="button" class="btn btn-link" >  Regresar a Staff</a> <?php
    }    
    include ('../layouts/footer.php');
?>      
</div>
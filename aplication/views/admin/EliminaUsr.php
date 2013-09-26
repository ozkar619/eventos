<?php session_start();
    include ('../../models/Conexion.php');
    include ('../../models/Modelo.php');    
    include ('../../libs/adodb5/adodb-pager.inc.php');
    include ('../../libs/adodb5/adodb.inc.php');
    include ('../../controllers/adminController/adminController.php');
    include ('../layouts/header.php');

    # Parametros
    $id_actividad = $_GET['act'];
    $id_evento = $_GET['evt'];
    $id_usuario = $_GET['usr'];
    
    # Datos Tabla
    $evt_asistentes_actividades = "evt_asistentes_actividades";
    $id_asis = "id_asistente = ".$id_usuario. " AND id_actividad= ".$id_actividad;
    
    $admin = new AdminController();
    $datos_usuarios = $admin->list_users(" WHERE id_asistente = ".$id_usuario);
    
?>

<br/><br/>
<div class="hero-unit">    
    <legend><strong>¿ Realmente Deseas Eliminar a este Usuario ?</strong></legend>
    
    <form method="POST">
        <input type="radio" name="confirm" value="si" checked="checked"/> [ <strong><?php echo $datos_usuarios[0]['nombre_asistente']." ".$datos_usuarios[0]['apellido_paterno']." ".$datos_usuarios[0]['apellido_materno']?> </strong>]
        <br/><br/><input class="btn btn-large btn-success" type="submit" value="Si,Eliminar"/>
        <a href="<?php echo "UsuariosAct.php?evt=$id_evento&act=$id_actividad"?>" class="btn btn-large btn-primary" type="button" > No,Regresar </a>
    </form>        
        <?php
            if ((isset($_POST['confirm'])) && ($_POST['confirm']=="si") ) :
                
                $nombre_tabla = $evt_asistentes_actividades;
                $id = $id_asis;                
                $admin->elimina($nombre_tabla, $id);                
                echo 'Eliminado Correctamente<br/>';
                ?> <a href="<?php echo "UsuariosAct.php?evt=$id_evento&act=$id_actividad"?>" type="button" class="btn btn-link" >  Regresar a Usuarios</a> <?php
            
            endif; if ( !((isset($_POST['confirm'])) && ($_POST['confirm']=="si") )) :?> 
        <?php endif; include ('../layouts/footer.php'); ?>    
</div>
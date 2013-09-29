<?php session_start(); // ADMINISTRADOR
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
    
    $llave = $admin->valida_eventos($id_evento, $_SESSION['nombre']);
    $llave2 = $admin->valida_actividades($id_evento, $_SESSION['nombre'], $id_actividad)
?>

<br/><br/>
<div class="hero-unit">    
    
    <?php if ( count($llave)!=0 && $llave[0]['id_asistente'] == $_SESSION['id_usuario'] && count($datos_usuarios)!=0  && count($llave2)!=0) : ?>
    
    <legend><strong>¿ Realmente Deseas Eliminar a este Usuario ?</strong></legend>
    
    <form method="POST">
        <input type="radio" name="confirm" value="si" checked="checked"/> 
        
        [ <strong>
            <?php 
            if (!isset($_POST['confirm'])) {
                echo ($datos_usuarios[0]['nombre_asistente']." ".$datos_usuarios[0]['apellido_paterno']." ".$datos_usuarios[0]['apellido_materno']);
            } else {
                echo ('Usuario Eliminado Correctamente');
            }
                
            ?> 
          </strong>]
        
        
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
<?php # Denegando Lista de Eventos
                endif; 
                if (count($llave2)==0) {
                    die('<h2>Error 404... Tu Solicitud no ha podido ser atendida. !!!');
                }
                if (count($datos_usuarios)==0) {
                    die('<h2>Error 404... Tu Solicitud no ha podido ser atendida. !!!');
                }
                if (count($llave) == 0) {
                    die('<h2>Error 404... Tu Solicitud no ha podido ser atendida. !!!');
                } else
                if ($llave[0]['id_asistente'] != $_SESSION['id_usuario']){                    
                    die('<h2>Error 404... Tu Solicitud no ha podido ser atendida. !!!');
                }                    
            ?>
<?php session_start(); // ADMINISTRADOR
    include ('../../models/Conexion.php');
    include ('../../models/Modelo.php');
    include ('../../models/Actividades.php');
    include ('../../libs/adodb5/adodb-pager.inc.php');
    include ('../../libs/adodb5/adodb.inc.php');
    include ('../../controllers/adminController/adminController.php');
    include ('../layouts/header.php');

    # Parametros
    $id_actividad = $_GET['act'];
    $id_evento = $_GET['evt'];

    # Datos
    $evt_actividades = "evt_actividades";
    $id_act = "id_actividad = $id_actividad";

    $admin = new AdminController();
    $datos_actividad = $admin->consulta_actividades($id_evento." AND id_actividad = ".$id_actividad);
    $total_usr = $admin->lista_usuarios($id_actividad);
    $llave = $admin->valida_eventos($id_evento, $_SESSION['nombre']);
    
?>
    
<br/><br/>
<div class="hero-unit">
    
    <?php # Validando Lista de Eventos
        if ( count($llave)!=0 && $llave[0]['id_asistente'] == $_SESSION['id_usuario'] && count($datos_actividad)!=0) : ?>
    
    <legend><strong>¿ Relamente Deseas Eliminar esta actividad y todos sus Usuarios Registrados ?</strong></legend>
    
    <form method="POST">
        <input type="radio" name="confirm" value="si" checked="checked"/> 
        
        [ <strong> 
            <?php
            if (!isset($_POST['confirm'])) {
                echo ($datos_actividad[0]['nombre_actividad']." - Usuarios Inscritos (".count($total_usr).") ");
            } else {
                echo ('Actividad Eliminada');
            }
             ?> 
          </strong>]        
          
          
        <br/><br/><input class="btn btn-large btn-success" type="submit" value="Si, Eliminar"/>
        <a href="<?php echo "Actividades.php?evt=".$id_evento?>" class="btn btn-large btn-primary" type="button" > No, Regresar </a>
    </form>  
        <?php if ((isset($_POST['confirm'])) && ($_POST['confirm']=="si") ) : 
                        
            $admin->elimina("evt_asistentes_actividades","id_actividad = ".$id_actividad);
            
            #--------Dejar Solo esto si se elimina por Cascada
            $nombre_tabla = $evt_actividades;
            $id = $id_act;            
            $admin->elimina($nombre_tabla, $id);
            echo 'Eliminado Correctamente<br/>';
            #----------------------------------------------------            
        ?> 
        <a href="<?php echo "Actividades.php?evt=".$id_evento ?>" type="button" class="btn btn-link" >  Regresar a Actividades</a> 
        <?php endif;    
        
        include ('../layouts/footer.php');?>
        
        <?php # Denegando Lista de Eventos
                endif; 
                if (count($datos_actividad)==0) {
                    die('<h2>Error 404... Tu Solicitud no ha podido ser atendida. !!!');
                }
                if (count($llave) == 0) {
                    die('<h2>Error 404... Tu Solicitud no ha podido ser atendida. !!!');
                } else
                if ($llave[0]['id_asistente'] != $_SESSION['id_usuario']){                    
                    die('<h2>Error 404... Tu Solicitud no ha podido ser atendida. !!!');
                }                    
            ?>
</div>

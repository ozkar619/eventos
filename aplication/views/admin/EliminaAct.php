<?php session_start();
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
    
    
?>
    
<br/><br/>
<div class="hero-unit">
    <strong>¿ Relamente Deseas Eliminar esta actividad y todos sus Usuarios Registrados ?</strong>
    <br><br>
    <form method="POST">
        <input type="radio" name="confirm" value="si" checked="checked"/> [ <strong><?php echo $datos_actividad[0]['nombre_actividad']." - Usuarios Inscritos (".count($total_usr).") " ?> </strong>]
        <br/>------------------------------------------------------------------<br>        
        <br/><br/><input class="btn btn-large btn-success" type="submit" value="Eliminar"/>
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
        <a href="<?php echo "Actividades.php?evt=$id_evento"?>" type="button" class="btn btn-link" >  Regresar a Usuarios</a> 
        <?php endif; if ( !((isset($_POST['confirm'])) && ($_POST['confirm']=="si") )) :?> 
            <a href="<?php echo "Actividades.php?evt=$id_evento"?>" type="button" class="btn btn-link" > Regresar</a> 
        <?php endif; include ('../layouts/footer.php'); ?>
</div>
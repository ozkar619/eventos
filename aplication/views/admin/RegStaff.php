<?php session_start(); // ADMINISTRADOR
    include ('../../models/Conexion.php');
    include ('../../models/Modelo.php');
    include ('../../models/Asistente_Tipo_Usuario.php');
    include ('../../models/Eventos_Tipos_Usuarios.php');
    include ('../../libs/adodb5/adodb-pager.inc.php');
    include ('../../libs/adodb5/adodb.inc.php');
    include ('../../controllers/adminController/adminController.php');
    include ('../../controllers/adminController/registroUsrStaff.php');
    include ('../../controllers/adminController/registroStaff_Evento.php');
    include ("../layouts/header.php");
    
    $admin = new AdminController();    
    $id_evento = $_GET['evt'];
    $id_asistente = $_GET['usr'];
    $arreglo = $admin->consulta_eventos_admin("a.id_asistente = ".$_SESSION['id_usuario']." AND e.id_evento = ".$id_evento);    
    $usuario = $admin->list_users("WHERE id_asistente = ".$id_asistente);
    $llave = $admin->valida_eventos($id_evento, $_SESSION['nombre'])
?>
    <br/><br/>        
    <div class="hero-unit">
        <?php # Validando Lista de Eventos
        if ( count($llave)!=0 && $llave[0]['id_asistente'] == $_SESSION['id_usuario'] && count($usuario)!=0 ) :?>
        
        <form method="POST">
            <legend><p>Asignar a [ <strong><?php echo $usuario[0]['nombre_asistente']?></strong> ] al equipo de STAFF de:</p></legend>
                        <p>
                <?php foreach ($arreglo as $key => $value) : ?>
                <input checked="checked" type="radio" name="id_evento" value="<?php echo $arreglo[$key]['id_evento']?>" required="required" /> [ <strong><?php echo $arreglo[$key]['nombre_evento']?></strong> ]<br/>
                <?php endforeach;?>
            </p>
            <br/><br/><input class="btn btn-large btn-success" type="submit" value="Asignar"/>
            <a href="<?php echo "staff.php?evt=".$id_evento?>" class="btn btn-large btn-primary" type="button" > Regresar </a>
        </form>            
    

<?php 

if ( (isset($_POST['id_evento'])) && (isset($_POST['id_evento'])== $arreglo[$key]['id_evento'])) {
    # Obtenemos Id del Tipo de Usuario = Staff
    $admin = new AdminController();    
    $arreglo = $admin->consulta_tipos_usuarios("WHERE tipo = 'Staff' ");
    $id_tipo_usuario = $arreglo[0]['id_tipo_usuario'];
    
    # Registramos al Usuario seleccionado como un miembro del Staff
    $asistenteTipoUsr = new registroUsrStaff_Controller();    
    $rs = array('id_asistente' => $id_asistente, 'id_tipo_usuario' => $id_tipo_usuario);    
    $asistenteTipoUsr->registraAsistenteStaff($rs);

    #Obtenemos el Id del asistente tipo de usuario para asignarle un evento
    $rs2 = $admin->consulta_id_AsistenteTipoUsuario($id_asistente, $id_tipo_usuario);
    $id_asistente_tipo_usuario = $rs2[0]['id_asistente_tipo_usuario'];
    
    #Registramos al Usuario como Staff a un evento Seleccionado
    $evtsTiposUsrs = new registroStaff_EventoController();
    $valores = array(
        'id_evento' => $_POST['id_evento'],
        'id_tipo_usuario' => $id_tipo_usuario,
        'id_asistente_tipo_usuario' => $id_asistente_tipo_usuario
    );
    $evtsTiposUsrs->registra_StaffEvento($valores);
    echo "<br/> Asignado Correctamente<br/>";    
    ?> <a href="<?php echo "staff.php?evt=".$id_evento?>" type="button" class="btn btn-link" >  Regresar al Staff</a> <?php
} else {
    
}
    

    
    include ('../layouts/footer.php');
?>
    <?php # Denegando Lista de Eventos
                endif; 
                if (count($usuario)==0) {
                    die('<h2>Error 404... Tu Solicitud no ha podido ser atendida. !!!');
                } else
                if (count($llave) == 0) {
                    die('<h2>Error 404... Tu Solicitud no ha podido ser atendida. !!!');
                } else
                if ($llave[0]['id_asistente'] != $_SESSION['id_usuario']){                    
                    die('<h2>Error 404... Tu Solicitud no ha podido ser atendida. !!!');
                }                    
            ?>
</div>        
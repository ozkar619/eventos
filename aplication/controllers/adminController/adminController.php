<?php

class AdminController {

    function AdminController() {
        
    }

    # Ver Lista de Asistentes  # <--- Modificar para Staff

    public function list_users( $where=";" ) {
        $usuario = new Modelo();
        $sql = ("SELECT * FROM evt_asistentes ".$where);
        $rs = $usuario->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }
    
    # Ver lista de Usuarios del Staff
    
    public function staff( $id_evento ){
        $usuario = new Modelo();
        $sql=(" SELECT DISTINCT (a.nombre_asistente), a.nctrl_rfc, a.apellido_paterno, a.apellido_materno, a.email, e.nombre_evento
            FROM evt_asistentes a
            INNER JOIN evt_asistentes_tipos_usuarios atu ON a.id_asistente = atu.id_asistente
            INNER JOIN evt_eventos_tipos_usuarios etu ON etu.id_asistente_tipo_usuario = atu.id_asistente_tipo_usuario
            INNER JOIN evt_eventos e ON etu.id_evento = e.id_evento
            WHERE etu.id_evento = ".$id_evento);
        $rs = $usuario->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }

    # Inserta Asistentes Tipos de Usuarios
    public function inserta_asistentes_tipos_usuarios( $rs ){
        $usuario = new Modelo();
        $sql=("");
        $rs = $usuario->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }

    #Consulta el Id del Asistente Tipo de Usuario de Manera Especifica
    
    public function consulta_id_AsistenteTipoUsuario( $id_asistente, $id_tipoUsuario ){
        $usuario = new Modelo();
        $sql = ("SELECT * FROM evt_asistentes_tipos_usuarios 
            WHERE  id_asistente = " . $id_asistente. " AND id_tipo_usuario = ".$id_tipoUsuario );
        $rs = $usuario->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }
    
    # Lista de Usuarios registrados en una actividad especifica

    public function lista_usuarios($id_actividad) {
        $usuario = new Modelo();
        $sql = ("SELECT * 
            FROM evt_actividades a INNER JOIN evt_asistentes_actividades ac            
            ON a.id_actividad = ac.id_actividad
            INNER JOIN evt_asistentes s ON s.id_asistente = ac.id_asistente
            WHERE  a.id_actividad = " . $id_actividad);
        $rs = $usuario->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }

    # Funcion que muestras los eventos del administrador con session iniciada

    public function consulta_eventos_admin($id_asistente) {
        $eventos = new Modelo();
        $sql = ("SELECT * FROM evt_eventos e
                    INNER JOIN evt_eventos_admin a ON e.id_evento = a.id_evento
                    WHERE a.id_asistente = " . $id_asistente);
        $rs = $eventos->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }

    #-> Funcion que Muestra en el Zebra Form los Datos Al formulario de la Actividad Seleccionada

    public function edita_actividades($id_actividad) {
        $eventos = new Modelo();
        $sql = ("SELECT * FROM evt_actividades 
            WHERE id_actividad = " . $id_actividad);
        $rs = $eventos->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }

    # Funcion que Muestra en el Zebra Form los Datos Al formulario del Evento Seleccionado

    public function edita_evento($id_evento) {
        $eventos = new Modelo();
        $sql = ("SELECT * FROM evt_eventos
            WHERE id_evento = " . $id_evento);
        $rs = $eventos->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }

    # Funcion que muestras cuantas actividades tiene el evento seleccionado

    public function consulta_actividades($id_evento) {
        $eventos = new Modelo();
        $sql = (" SELECT * FROM evt_actividades 
            WHERE id_evento = " . $id_evento );
        $rs = $eventos->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }

    # Funcion que Valida las entradas en los id's de Eventos

    public function valida_eventos($id_evento, $nombre_asistente) {
        $eventos = new Modelo();
        $sql = ("SELECT ea.id_asistente
                FROM evt_eventos_admin ea inner join evt_asistentes a 
                ON ea.id_asistente = a.id_asistente
                WHERE ea.id_evento = " . $id_evento . " AND a.nombre_asistente = '" . $nombre_asistente . "'");
        $rs = $eventos->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }

    # Funcion que Valida las entradas en los id's de Actividades

    public function valida_actividades($id_evento, $nombre_asistente, $id_actividad) {
        $eventos = new Modelo();
        $sql = ("SELECT ea.id_asistente
                FROM evt_eventos_admin ea inner join evt_asistentes a 
                ON ea.id_asistente = a.id_asistente inner join evt_actividades ac on ac.id_evento = ea.id_evento
                WHERE ea.id_evento = " . $id_evento . " AND a.nombre_asistente = '" . $nombre_asistente . "'  and ac.id_actividad = " . $id_actividad . ";");
        $rs = $eventos->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }

    # Funcion para ver los tipos de actividades

    public function consulta_tipos_actividades() {
        $eventos = new Modelo();
        $sql = (" SELECT * FROM evt_tipos_actividades");
        $rs = $eventos->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }
    
    # Consulta tipos de Usuarios
    
    public function consulta_tipos_usuarios( $where = ";" ){
        $eventos = new Modelo();
        $sql = (" SELECT * FROM evt_tipos_usuarios ".$where);                
        $rs = $eventos->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }

    # Funcion para eliminar la actividad or ID

    public function elimina($nombre_tabla, $Where) {
        $evento = new Modelo();
        $sql = ("DELETE FROM " . $nombre_tabla . " WHERE " . $Where);
        $evento->db->Execute($sql);
        //die($sql);
    }

}

?>
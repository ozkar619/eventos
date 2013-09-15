<?php

class AdminController {

    function AdminController() {
        
    }

    public function list_users() {
        $usuario = new Usuario();
        $sql = ("SELECT * FROM evt_asistentes ");
        $rs = $usuario->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }
    
    public function lista_usuarios( $id_actividad ) {
        $usuario = new Usuario();
        $sql = ("
            SELECT * 
            FROM evt_actividades a INNER JOIN evt_asistentes_actividades ac            
            ON a.id_actividad = ac.id_actividad
            INNER JOIN evt_asistentes s ON s.id_asistente = ac.id_asistente
            WHERE  a.id_actividad = ".$id_actividad);
        $rs = $usuario->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }
    
    public function lista_usuarios_admin( $id_asistente ) {
        $usuario = new Usuario();
        $sql = ("
            
            ");
        $rs = $usuario->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }

    # Funcion que muestras los eventos del administrador con session iniciada

    public function consulta_eventos($id_asistente) {
        $eventos = new Modelo();
        $sql = ("SELECT * FROM evt_eventos e
                    INNER JOIN evt_eventos_admin a ON e.id_evento = a.id_evento
                    WHERE a.id_asistente = " . $id_asistente);
        $rs = $eventos->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }

    # Funcion que cuenta cuantos eventos tiene asignados el administrador con session iniciada

    public function consulta_numero_eventos($id_asistente) {
        $eventos = new Modelo();
        $sql = ("SELECT COUNT( * ) AS numero_eventos FROM evt_eventos e
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

    #-> Funcion que Muestra en el Zebra Form los Datos Al formulario del Evento Seleccionado

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
        $sql = ("SELECT * FROM evt_actividades 
            WHERE id_evento = " . $id_evento);
        $rs = $eventos->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }

    # Funcion que cuenta cuantas actividades tiene el evento seleccionado

    public function consulta_numero_actividades($id_evento) {
        $eventos = new Modelo();
        $sql = ("SELECT COUNT( * ) AS numero_actividades FROM evt_actividades 
            WHERE id_evento = " . $id_evento);
        $rs = $eventos->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }
    
    # Funcio que Valida las entradas en los id's 
    public function valida_eventos( $id_evento, $nombre_asistente){
        $eventos = new Modelo();        
        $sql = ("SELECT ea.id_asistente
                FROM evt_eventos_admin ea inner join evt_asistentes a 
                ON ea.id_asistente = a.id_asistente
                WHERE ea.id_evento = ".$id_evento." AND a.nombre_asistente = '".$nombre_asistente."'");        
        
        $rs = $eventos->consulta_sql($sql);
        $arreglo = $rs->GetArray();        
        return $arreglo;
        
        
    }

}

?>

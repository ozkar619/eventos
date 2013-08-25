<?php

class AdminController {

    function AdminController() {
        
    }

    public function lista_usuarios() {
        $usuario = new Usuario();
        $usuario->show_grid();
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

}

?>

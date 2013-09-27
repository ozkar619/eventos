<?php

class asistenteController extends Asistentes_Actividades {

    public function regresa_actividades_usuario($id_usuario, $opc) {
        //si opc  = 0 regresa TODAS LAS ACTIVIDADES, si es != 0 regresa solo las no vencidas
        if ($opc == 0) {
            $sql = "SELECT ea.id_actividad,ee.nombre_evento, ea.nombre_actividad, ea.fecha_inicio, ea.fecha_fin, ea.hora_inicio, ea.hora_fin, eaa.pago, ea.precio
               FROM evt_actividades ea JOIN evt_asistentes_actividades eaa 
               ON ea.id_actividad = eaa.id_actividad JOIN evt_eventos ee 
               ON ee.id_evento = ea.id_evento
               WHERE eaa.id_asistente = " . $id_usuario;
        } else {
            $hoy = date("Y-m-d");
            $sql = "SELECT ee.nombre_evento, ea.nombre_actividad, ea.fecha_inicio, ea.fecha_fin, ea.hora_inicio, ea.hora_fin, eaa.pago, ea.precio
               FROM evt_actividades ea JOIN evt_asistentes_actividades eaa 
               ON ea.id_actividad = eaa.id_actividad JOIN evt_eventos ee 
               ON ee.id_evento = ea.id_evento
               WHERE eaa.id_asistente = " . $id_usuario . " AND ea.fecha_fin >= '" . $hoy . "'";
        }
        $rs = $this->consulta_sql($sql);
        $rows = $rs->GetArray();
        return $rows;
    }

    public function regresa_nombre($id_usu) {
        $sql = "select nombre_asistente from evt_asistentes where id_asistente = " . $id_usu;
        $rs = $this->consulta_sql($sql);
        $rows = $rs->GetArray();
        $nombre = $rows[0];
        return ($nombre[0]);
    }

    public function baja_actividad($id_usu, $id_act) {
        $where="id_asistente = ".$id_usu." and id_actividad = ".$id_act;
        return $this->elimina($where);
    }

}

?>

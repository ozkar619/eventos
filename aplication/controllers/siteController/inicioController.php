<?php

class InicioControler extends Evento{

    public function muestra_eventos($eventos = 0) {
        //$eventos -> controla el total de eventos que se quieren mostrar
        $hoy = date("Y-m-d");
        if ($eventos == 0) {//muestra todos los eventos por haber  
            $sql = "SELECT * FROM " . $this->nombre_tabla .
                    " where fecha_fin > " . "'" . "$hoy" . "'". " order by fecha_fin asc";
        } else {//smuestra los "$eventos" eventos mas proximos a terminarse 
            $sql = "SELECT * FROM " . $this->nombre_tabla .
                    " where fecha_fin > " . "'" . "$hoy" . "'" . " order by fecha_fin asc limit " . $eventos;
        }
        
        $rs = $this->consulta_sql($sql);
        $rows = $rs->GetArray();
        return $rows;
    }

    public function muestra_actividades($id_evento) {
        $sql = "SELECT * FROM evt_actividades " .
                "WHERE id_evento = '" . $id_evento . "'";
        $rs = $this->consulta_sql($sql);
        $rows = $rs->GetArray();
        return $rows;
    }

    public function registrar_a_evento($id_usuario, $id_evento) {

        $sql = "INSERT INTO evt_eventos_admin (id_evento, id_asistente) 
                 VALUES (" . $id_evento . "," . $id_usuario . ")";
        return $this->consulta_sql($sql);
    }

    public function checa_registro_duplicado($id_usuario, $id_evento) {
        $sql = "SELECT COUNT(*) FROM evt_eventos_admin 
                WHERE id_evento = " . $id_evento . " and " . "id_asistente = " . $id_usuario ;
        $rs = $this->consulta_sql($sql);
        $rows = $rs->GetArray();
        $cant = $rows[0];
        return ($cant[0]);
    }
    
    public function regresa_evento($id){
        $sql= "SELECT * FROM evt_eventos where id_evento = "+$id;
        $rs = $this->consulta_sql($sql);
        return $rs->GetArray();
    }

}
?>

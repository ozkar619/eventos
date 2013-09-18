<?php

class asistente_actividadedController extends Asistentes_Actividades {

    public function regresa_actividad($id_evento, $id_tipo) {
        if ($id_tipo == 0) {//si es cero regresa todas las actividades
            $sql = "select * from evt_actividades where id_evento = " . $id_evento;
        } else {//si no es 0 regresa el todas las actividades que sean del mismo $id_tipo
            $sql = "select * from evt_actividades where id_evento = " . $id_evento . " and 
               id_tipo_actividad = " . $id_tipo;
        }
        $rs = $this->consulta_sql($sql);
        $rows = $rs->GetArray();
        return $rows;
    }

    public function regresa_tipos_actividad($id_evento) {
        $sql = "select DISTINCT(eta.tipo_actividad),eta.id_tipo_actividad from evt_tipos_actividades eta
                join evt_actividades ea on eta.id_tipo_actividad = ea.id_tipo_actividad
                where ea.id_evento= " . $id_evento;
        $rs = $this->consulta_sql($sql);
        $rows = $rs->GetArray();
        return $rows;
    }

    public function regresa_img_evento($id_eve) {
        $sql = "select imagen from evt_eventos where id_evento = " . $id_eve;
        $rs = $this->consulta_sql($sql);
        $rows = $rs->GetArray();
        $img = $rows[0];
        return ($img[0]);
    }

    public function regresa_nombre_evento($id_eve) {
        $sql = "select nombre_evento from evt_eventos where id_evento = " . $id_eve;
        $rs = $this->consulta_sql($sql);
        $rows = $rs->GetArray();
        $nombre = $rows[0];
        return ($nombre[0]);
    }

    public function checa_registro_duplicado($valores) {
        $sql = "select * from " . $this->nombre_tabla . " where id_asistente = " . $valores['id_usuario'] . " and id_actividad
              = " . $valores['id_actividad'];
        $rs = $this->consulta_sql($sql);
        $rows = $rs->GetArray();
        if (count($rows) != 0) {
            return false;
        }
        return true;
    }
    public function checa_cruce_horario($valores){
        
    }


    

    public function registraUsuario_actividad($valores) {
        parent::Asistentes_Actividades();
        if(!$this->checa_registro_duplicado($valores)){
            return false;
        }

        if ($valores['precio'] == 0) {
            $this->set_pago(1);
        } else {
            $this->set_pago(0);
        }
        $this->set_id_asistente($valores['id_usuario']);
        $this->set_id_actividad($valores['id_actividad']);
        $this->set_fecha_registro(date("Y-m-d"));
        $this->set_asistio(0);
        return $this->inserta($this->get_atributos());
    }

}

?>
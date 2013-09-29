<?php // ADMINISTRADOR

class registroStaff_EventoController extends Eventos_Tipos_Usuarios {

    function registroStaff_EventoController() {
        
    }

    public function registra_StaffEvento($valores) {
        parent::Eventos_Tipos_Usuarios();
        //die($valores['id_evento']." ".$valores['id_tipo_usuario']." ".$valores['id_asistente_tipo_usuario']);
        $this->set_id_evento($valores['id_evento']);
        $this->set_id_tipo_usuario($valores['id_tipo_usuario']);
        $this->set_id_asistente_tipo_usuario($valores['id_asistente_tipo_usuario']);
        return $this->inserta($this->get_atributos());
    }

}

?>

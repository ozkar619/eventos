<?php // ADMINISTRADOR

class registroUsrStaff_Controller extends Asistente_Tipo_Usuario {

    function registroUsrStaff_Controller() {        
    }

    public function registraAsistenteStaff($valores) {
        parent::Asistente_Tipo_Usuario();        
        $this->set_id_asistente($valores['id_asistente']);
        $this->set_id_tipo_usuario($valores['id_tipo_usuario']);        
        return $this->inserta($this->get_atributos());
    }

}
?>

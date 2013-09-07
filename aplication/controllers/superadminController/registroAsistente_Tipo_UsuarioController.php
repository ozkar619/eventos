<?php
class RegistroAsistente_Tipo_UsuarioController extends Asistente_Tipo_Usuario {

    function RegistroAsistente_Tipo_UsuarioController() {
        
    }

    public function registraAsistente_Tipo_Usuario($valores) {
        parent::Asistente_Tipo_Usuario();
        $this->set_id_asistente($valores['id_asistente']);
        $this->set_id_tipo_usuario($valores['id_tipo_usuario']);
        return $this->inserta($this->get_atributos());
    }

}
?>

<?php
class RegistroEvento_Tipo_UsuarioController extends Eventos_Tipos_Usuarios {

    function RegistroEvento_Tipo_UsuarioController() {
        
    }

    public function registraEvento_Tipo_Usuario($valores) {
        parent::Eventos_Tipos_Usuarios();
        $this->set_id_evento($valores['id_evento']);
        $this->set_id_tipo_usuario($valores['id_tipo_usuario']);
        return $this->inserta($this->get_atributos());
        
    }

}
?>

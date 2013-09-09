<?php
class RegistroTipo_UsuarioController extends Tipo_Usuario {

    function RegistroTipo_UsuarioController() {
        
    }

    public function registraTipo_Usuario($valores) {
        parent::Tipo_Usuario();
        $this->set_tipo($valores['tipo']);
        return $this->inserta($this->get_atributos());
    }

}
?>

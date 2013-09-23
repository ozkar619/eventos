<?php
class RegistroEvtAdminController extends Eventos_Admin {

    function RegistroEvtAdminController() {
        
    }

    public function registraEventos_Admin($valores) {
        parent::Eventos_admin();
        $this->set_id_asistente($valores['id_asistente']);
        $this->set_id_evento($valores['id_evento']);
        $this->set_tipo($valores['tipo']);
        return $this->inserta($this->get_atributos());
    }

}
?>

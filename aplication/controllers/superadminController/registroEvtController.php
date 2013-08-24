<?php

class RegistroEvtController extends Evento {

    function RegistroEvtController() {
        
    }

    public function registraEvento($valores) {
        parent::Evento();
        $this->set_nombre_evento($valores['nombre_evento']);
        $this->set_contacto($valores['contacto']);
        $this->set_lugar($valores['lugar']);
        $this->set_informacion($valores['informacion']);
        $this->set_fecha_inicio($valores['fecha_inicio']);
        $this->set_fecha_fin($valores['fecha_fin']);
        $this->set_imagen($valores['imagen']);
        return $this->inserta($this->get_atributos());
    }

}

?>

<?php

class RegistroActController extends Actividades {

    function RegistroActController() {
        
    }

    function registraActividad($valores) {
        parent::Actividad();
        $this->set_id_evento($valores['id_evento']);
        $this->set_id_instructor($valores['id_instructor']);
        $this->set_id_tipo_actividad($valores['id_tipo_actividad']); 
        $this->set_nombre_actividad($valores['nombre_actividad']);
        $this->set_lugar($valores['lugar']);
        $this->set_precio($valores['precio']);
        $this->set_fecha_inicio($valores['fecha_inicio']);
        $this->set_fecha_fin($valores['fecha_fin']);
        $this->set_hora_inicio($valores['hora_inicio']);
        $this->set_hora_fin($valores['hora_fin']);
        $this->set_descripcion($valores['descripcion']);
        $this->set_imagen($valores['imagen']);
        return $this->inserta($this->get_atributos());
    }

}

?>

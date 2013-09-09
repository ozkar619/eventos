<?php
class RegistroTipo_ActividadController extends Tipo_Actividad {

    function RegistroTipo_ActividadController() {
        
    }

    public function registraTipo_Actividad($valores) {
        parent::Tipo_Actividad();
        $this->set_tipo_actividad($valores['tipo_actividad']);
        return $this->inserta($this->get_atributos());
    }

}
?>

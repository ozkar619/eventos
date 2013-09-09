<?php
class ActualizaEvtController extends Modelo {

    function ActualizaEvtController() {
        
    }

    function actualiza_eventos($valores, $id_evento) {
        parent::Modelo();
        $sql = ("            
            UPDATE  `evt_eventos` 

            SET 
            `nombre_evento` =  '" . $valores['nombre_evento'] . "',
            `contacto` =  '" . $valores['contacto'] . "',
            `lugar` =  '" . $valores['lugar'] . "',
            `informacion` =  '" . $valores['informacion'] . "',
            `fecha_inicio` =  '" . $valores['fecha_inicio'] . "',
            `fecha_fin` =  '" . $valores['fecha_fin'] . "',
            `imagen` =  '" . $valores['imagen'] . "' 

            WHERE `id_evento` =" . $id_evento . ";
        ");
        return $this->consulta_sql($sql);
    }

}
?>

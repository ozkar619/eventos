<?php

class ActualizaController extends Modelo {

    function ActualizaController() {
        
    }

    #-> Funcion Que actualiza todos los Datos de Actividades enviados del Zebra Form

    function actualiza_actividad($valores, $id_actividad) {
        parent::Modelo();
        $sql = ("
            UPDATE `evt_actividades` 
            SET 

                `id_instructor` =  '" . $valores['id_instructor'] . "',
                `nombre_actividad` =  '" . $valores['nombre_actividad'] . "',
                `lugar` =  '" . $valores['lugar'] . "',
                `precio` =  '" . $valores['precio'] . "',
                `descripcion` =  '" . $valores['descripcion'] . "',
                `fecha_inicio` =  '" . $valores['fecha_inicio'] . "',
                `fecha_fin` =  '" . $valores['fecha_fin'] . "',
                `hora_inicio` =  '" . $valores['hora_inicio'] . "',
                `hora_fin` =  '" . $valores['hora_fin'] . "',
                `imagen` =  '" . $valores['imagen'] . "' 

            WHERE `id_actividad` =" . $id_actividad . ";
            ");
        return $this->consulta_sql($sql);
    }

    #-> Funcion Que actualiza todos los Datos de Eventos enviados del Zebra Form

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

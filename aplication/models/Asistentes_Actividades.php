<?php

class Asistentes_actividades extends Modelo{
    public $nombre_tabla = 'evt_asistentes_actividades';
    public $pk = 'id_asistente_evento';
    
    
    public $atributos = array(
                'id_asistente'=>array(),
                'id_actividad'=>array(),
                'fecha_registro'=>array(),
                'asistio'=>array(),
                'pago'=>array()
    );
    
    private $id_asistente;
    private $id_actividad;
    private $fecha_registro;
    private $asistio;
    private $pago;
    
    
    function Asistentes_actividades() {
        parent::Modelo();
    }
    
    public function get_atributos(){
        $rs = array();
        foreach ($this->atributos as $key => $value) {
            $rs[$key]=$this->$key;
        }
        return $rs;
    }
    
    
    public function set_id_asistente($valor){
        $this->id_asistente = $valor;
    }
   
    public function set_id_actividad($valor){
        $this->id_actividad = $valor;
    }
    
    
    
    public function set_fecha_registro($valor){
        $this->fecha_registro=$valor;
    }
    
    
    public function set_pago($valor){
        $this->pago= $valor;
    }
    
   
    public function set_asistio($valor){
        $this->asistio = $valor;
    } 
}

?>

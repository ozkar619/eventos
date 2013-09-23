<?php

class Eventos_Admin extends Modelo{
    
    public $nombre_tabla='evt_eventos_admin';
    public $pk='id_evento_admin';
    
    public $atributos = array(
        'id_evento' => array(),
        'id_asistente' => array(),
        'tipo' => array(),
    );
    private $id_evento;
    private $id_asistente;
    private $tipo;
    
    function Eventos_admin(){
        parent::Modelo();
    }
    
    public function get_atributos() {
        $rs = array();
        foreach ($this->atributos as $key => $value) {
            $rs[$key] = $this->$key;
        }
        return $rs;
    }
    
     public function get_id_evento() {
        return $this->id_evento;
    }
    public function set_id_evento( $valor ) {
        $this->id_evento = $valor;
    }
    
     public function get_id_asistente() {
        return $this->id_asistente;
    }
    public function set_id_asistente( $valor ) {
        $this->id_asistente = $valor;
    }
    
     public function get_tipo() {
        return $this->tipo;
    }
    public function set_tipo( $valor ) {
        $this->tipo = $valor;
    }
}
?>

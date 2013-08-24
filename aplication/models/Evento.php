<?php

class Evento extends Modelo {

    public $nombre_tabla = 'evt_eventos';
    public $pk = 'id_evento';
    public $atributos = array(
        'nombre_evento' => array(),
        'contacto' => array(),
        'lugar' => array(),
        'informacion' => array(),
        'fecha_inicio' => array(),
        'fecha_fin' => array(),
        'imagen' => array()
    );
    private $nombre_evento;
    private $contacto;
    private $lugar;
    private $informacion;
    private $fecha_inicio;
    private $fecha_fin;
    private $imagen;

    function Evento() {
        parent::Modelo();
    }

    public function get_atributos() {
        $rs = array();
        foreach ($this->atributos as $key => $value) {
            $rs[$key] = $this->$key;
        }
        return $rs;
    }

    public function get_nombre_evento() {
        return $this->nombre_evento;
    }

    public function set_nombre_evento($valor) {
        $this->nombre_evento = $valor;
    }

    public function get_contacto() {
        return $this->contacto;
    }

    public function set_contacto($valor) {
        $this->contacto = $valor;
    }

    public function get_lugar() {
        return $this->lugar;
    }

    public function set_lugar($valor) {
        $this->lugar = $valor;
    }

    public function get_informacion() {
        return $this->informacion;
    }

    public function set_informacion($valor) {
        $this->informacion = $valor;
    }

    public function get_fecha_inicio() {
        return $this->fecha_inicio;
    }

    public function set_fecha_inicio($valor) {
        $this->fecha_inicio = $valor;
    }

    public function get_fecha_fin() {
        return $this->fecha_fin;
    }

    public function set_fecha_fin($valor) {
        $this->fecha_fin = $valor;
    }

    public function get_imagen() {
        return $this->imagen;
    }

    public function set_imagen($valor) {
        $this->imagen = $valor;
    }

}

?>

<?php

class Actividades extends Modelo {

    public $nombre_tabla = 'evt_actividades';
    public $pk = 'id_actividad';
        
    public $atributos = array(
        'id_evento' => array(),
        'id_instructor' => array(),
        'id_tipo_actividad' => array(),
        'nombre_actividad' => array(),
        'lugar' => array(),
        'precio' => array(),
        'descripcion' => array(),
        'fecha_inicio' => array(),
        'fecha_fin' => array(),
        'hora_inicio' => array(),
        'hora_fin' => array(),
        'imagen' => array(),
        'capacidad' => array()
    );
        
    private $id_evento;
    private $id_instructor;
    private $id_tipo_actividad;
    private $nombre_actividad;
    private $lugar;
    private $precio;
    private $descripcion;
    private $fecha_inicio;
    private $fecha_fin;
    private $hora_inicio;
    private $hora_fin;
    private $imagen;
    private $capacidad;

    function Actividad() {
        parent::Modelo();
    }

    public function get_atributos() {
        $rs = array();
        foreach ($this->atributos as $key => $value) {
            $rs[$key] = $this->$key;
        }
        return $rs;
    }

    
    # id_evento
    public function get_id_evento() {
        return $this->id_evento;
    }
    public function set_id_evento( $valor ) {
        $this->id_evento = $valor;
    }
    
    # id_instructor
    public function get_id_instructor() {
        return $this->id_instructor;
    }
    public function set_id_instructor( $valor ) {
        $this->id_instructor = $valor;
    }
    
    # id_tipo_actividad
    public function get_id_tipo_actividad() {
        return $this->id_tipo_actividad;
    }
    public function set_id_tipo_actividad( $valor ) {
        $this->id_tipo_actividad = $valor;
    }
    
    # nombre_actividad
    public function get_nombre_actividad() {
        return $this->nombre_actividad;
    }
    public function set_nombre_actividad( $valor ) {
        $this->nombre_actividad = $valor;
    }
    
    # lugar
    public function get_lugar() {
        return $this->lugar;
    }
    public function set_lugar( $valor ) {
        $this->lugar = $valor;
    }
    
    # precio
    public function get_precio() {
        return $this->precio;
    }
    public function set_precio( $valor ) {
        $this->precio = $valor;
    }
    
    # descripcion
    public function get_descripcion() {
        return $this->descripcion;
    }
    public function set_descripcion( $valor ) {
        $this->descripcion = $valor;
    }
    
    # fecha_inicio
    public function get_fecha_inicio() {
        return $this->fecha_inicio;
    }
    public function set_fecha_inicio( $valor ) {
        $this->fecha_inicio = $valor;
    }
    
    # fecha_fin
    public function get_fecha_fin() {
        return $this->fecha_fin;
    }
    public function set_fecha_fin( $valor ) {
        $this->fecha_fin = $valor;
    }
    
    # hora_inicio
    public function get_hora_inicio() {
        return $this->hora_inicio;
    }
    public function set_hora_inicio( $valor ) {
        $this->hora_inicio = $valor;
    }
    
    # hora_fin
    public function get_hora_fin() {
        return $this->hora_fin;
    }
    public function set_hora_fin( $valor ) {
        $this->hora_fin = $valor;
    }
    
    # imagen
    public function get_imagen() {
        return $this->imagen;
    }
    public function set_imagen( $valor ) {
        $this->imagen = $valor;
    }
    
    # capacidad
    public function get_capacidad() {
        return $this->capacidad;
    }
    public function set_capacidad( $valor ) {
        $this->capacidad= $valor;
    }
    
}
?>
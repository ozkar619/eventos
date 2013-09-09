<?php
class Tipo_Actividad extends Modelo{
    public $nombre_tabla="evt_tipos_actividades";
    public $pk="id_tipo_actividad";
    public $atributos=array(
        'tipo_actividad'=>array()
    );
    
    private $tipo_actividad;
    
    function Tipo_Actividad(){
        parent::Modelo();
    }
    
    public function get_atributos(){
        $rs=array();
        foreach($this->atributos as $key=>$value){
            $rs[$key]=$this->$key;
        }
        return $rs;
    }
    
    
    public function get_tipo_actividad(){
        return $this->tipo_actividad;
    }
    public function set_tipo_actividad($valor){
        $this->tipo_actividad=$valor;
    }
}
?>
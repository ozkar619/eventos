<?php
class Tipo_Usuario extends Modelo{
    public $nombre_tabla="evt_tipos_usuarios";
    public $pk="id_tipo_usuario";
    public $atributos=array(
        'tipo'=>array()
    );
    
    private $tipo;
    
    function Tipo_Usuario(){
        parent::Modelo();
    }
    
    public function get_atributos(){
        $rs=array();
        foreach($this->atributos as $key=>$value){
            $rs[$key]=$this->$key;
        }
        return $rs;
    }
    
    
    public function get_tipo(){
        return $this->tipo;
    }
    public function set_tipo($valor){
        $this->tipo=$valor;
    }
}
?>

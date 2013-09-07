<?php
class Asistente_Tipo_Usuario extends Modelo{
    public $nombre_tabla="evt_asistentes_tipos_usuarios";
    public $pk="id_asistente_tipo_usuario";
    public $atributos=array(
        'id_asistente'=>array(),
        'id_tipo_usuario'=>array()
    );
    
    private $id_asistente;
    private $id_tipo_usuario;
    
    function Asistente_Tipo_Usuario(){
        parent::Modelo();
    }
    
    public function get_atributos(){
        $rs=array();
        foreach($this->atributos as $key=>$value){
            $rs[$key]=$this->$key;
        }
        return $rs;
    }
    
    public function get_id_asistente(){
        return $this->id_asistente;
    }
    public function set_id_asistente($valor){
        $this->id_asistente=$valor;
    }
    
    public function get_id_tipo_usuario(){
        return $this->id_tipo_usuario;
    }
    public function set_id_tipo_usuario($valor){
        $this->id_tipo_usuario=$valor;
    }
}
?>

<?php
class Eventos_Tipos_Usuarios extends Modelo{
    public $nombre_tabla="evt_eventos_tipos_usuarios";
    public $pk="id_evento_tipo_usuario";
    public $atributos=array(
        'id_evento'=>array(),
        'id_tipo_usuario'=>array()
    );
    
    private $id_evento;
    private $id_tipo_usuario;
    
    function Eventos_Tipos_Usuarios(){
        parent::Modelo();
    }
    
    public function get_atributos(){
        $rs=array();
        foreach($this->atributos as $key=>$value){
            $rs[$key]=$this->$key;
        }
        return $rs;
    }
    
    public function get_id_evento(){
        return $this->id_evento;
    }
    public function set_id_evento($valor){
        $this->id_evento=$valor;
    }
    
    public function get_id_tipo_usuario(){
        return $this->id_tipo_usuario;
    }
    public function set_id_tipo_usuario($valor){
        $this->id_tipo_usuario=$valor;
    }
}
?>

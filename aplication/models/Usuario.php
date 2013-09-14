<?php

class Usuario extends Modelo{
    public $nombre_tabla = 'evt_asistentes';
    public $pk = 'id_asistente';
    
    
    public $atributos = array(
                'nombre_asistente'=>array(),
                'email'=>array(),
                'password'=>array(),
                'apellido_paterno'=>array(),
                'apellido_materno'=>array(),
                'sexo'=>array(),
                'edad'=>array(),
                'nctr_rfc'=>array()
    );
    
    private $nombre_asistente;
    private $apellido_paterno;
    private $apellido_materno;
    private $sexo;
    private $edad;
    private $email;
    private $password;
    private $nctr_rfc;
    
    
    function Usuario() {
        parent::Modelo();
    }
    
    public function get_atributos(){
        $rs = array();
        foreach ($this->atributos as $key => $value) {
            $rs[$key]=$this->$key;
        }
        return $rs;
    }
    
    
    public function get_nctr_rfc(){
        return $this->nctr_rfc;
    } 
    public function set_nctr_rfc($valor){
        $this->nctr_rfc = $valor;
    }
    
    public function get_edad(){
        return $this->edad;
    } 
    public function set_edad($valor){
        $this->edad = $valor;
    }
    
    
    public function get_sexo(){
        return $this->sexo;
    } 
    public function set_sexo($valor){
        $this->sexo = $valor;
    }
    
    
    public function get_apellido_materno(){
        return $this->apellido_materno;
    } 
    public function set_apellido_materno($valor){
        $this->apellido_materno = $valor;
    }
    
    public function get_apellido_paterno(){
        return $this->apellido_paterno;
    } 
    public function set_apellido_paterno($valor){
        $this->apellido_paterno = $valor;
    }
    
    public function get_nombre(){
        return $this->nombre_asistente;
    } 
    public function set_nombre($valor){
        $this->nombre_asistente = $valor;
    }
    
    
    public function get_email(){
        return $this->email;
    } 
    public function set_email($valor){
        
        $rs = $this->consulta_sql("select * from evt_asistentes where email = '$valor'");
        $rows = $rs->GetArray();
        $this->email = $valor;
        
    } 
    
    
    public function get_password(){
        return $this->password;
    } 
    public function set_password($valor){
        $this->password = md5($valor);
    }

    
    
    
}

?>

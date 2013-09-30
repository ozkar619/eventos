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
        'genero'=>array(),
        'edad'=>array(),
        'nctr_rfc'=>array()
    );
    
    public $errores = array( );
    
    private $nombre_asistente;
    private $apellido_paterno;
    private $apellido_materno;
    private $genero;
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
        $this->nctr_rfc = trim($valor);
    }
    
    public function get_edad(){
        return $this->edad;
    } 
    public function set_edad($valor){
        $this->edad = trim($valor);
    }
    
    
    public function get_genero(){
        return $this->genero;
    } 
    public function set_genero($valor){
        $this->genero = trim($valor);
    }
    
    
    public function get_apellido_materno(){
        return $this->apellido_materno;
    } 
    public function set_apellido_materno($valor){
        $this->apellido_materno = trim($valor);
    }
    
    public function get_apellido_paterno(){
        return $this->apellido_paterno;
    } 
    public function set_apellido_paterno($valor){
        $this->apellido_paterno = trim($valor);
    }
    
    public function get_nombre(){
        return $this->nombre_asistente;
    } 
    public function set_nombre($valor){
        $this->nombre_asistente = trim($valor);
    }
    
    
    public function get_email(){
        return $this->email;
    } 
    public function set_email($valor){
        
        $rs = $this->consulta_sql("select * from evt_asistentes where email = '$valor'");
        $rows = $rs->GetArray();
        
        if(count($rows) > 0){
            $this->email = "";
            $this->errores[] = "Este e-mail (".$valor.") ya esta registrado"; 
        }else{
            $this->email = trim($valor);
        }
        
        //die("Ya existe: ".count($rows));
        
        
        
    } 
    
    
    public function get_password(){
        return $this->password;
    } 
    public function set_password($valor){
        $this->password = md5($valor);
    }

    
    
    
}

?>

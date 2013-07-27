<?php

class RegistroController extends Usuario{
    
    function RegistroController(){
        
    }
    
    public function registraUsuario($valores){
            parent::Usuario();
            $this->set_nombre($valores['nombre_asistente']);
            $this->set_email($valores['email']);
            $this->set_password($valores['password']);
            $this->set_apellido_materno($valores['apellido_materno']);
            $this->set_apellido_paterno($valores['apellido_paterno']);
            $this->set_sexo($valores['sexo']);
            $this->set_edad($valores['edad']);
            $this->set_nctr_rfc('');
            return $this->inserta($this->get_atributos());
    }
    
        
}


?>

<?php

class AdminController {

    function AdminController(){
        
    }
    
    public function lista_usuarios(){
        $usuario = new Usuario();
        $select = " nombre_asistente,apellido_paterno,apellido_materno,genero, edad, email, nctr_rfc ";
        $usuario->show_grid();
    }
    
    
}  

?>

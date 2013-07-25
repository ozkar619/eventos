<?php

class AdminController {

    function AdminController(){
        
    }
    
    public function lista_usuarios(){
        $usuario = new Usuario();
        $select = "nombre,
                   apellido_paterno,
                   apellido_materno,
                   sexo, edad, email, nctr_rfc";
        $usuario->show_grid($select);
    }
    
    
}  

?>

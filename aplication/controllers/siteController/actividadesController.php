<?php

class actividadesController extends Actividades{
    
    public function regresa_acti($id_evento){
        $sql = "select * from ".$this->nombre_tabla." where id_evento = ".$id_evento;
    }
    
    
    
}



?>
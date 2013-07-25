<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Valida
 *
 * @author ozkar
 */
class Valida {
    private $explesiones = array(
        'text'=>'',
        'email'=>'',
        'integer'=>''
    );
    
    public function valida_er($tipo,$cadena){
        return preg_match($this->explesiones[$tipo], $cadena);
    }
}

?>

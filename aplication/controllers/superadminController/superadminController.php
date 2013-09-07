<?php
class SuperadminController{
    function SuperadminController(){
        
    }
    public function lista_eventos(){
        $evento = new Evento();
        $sql = ("Select * from  evt_eventos");
        $rs = $evento->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }
    public function list_users() {
        $usuario = new Usuario();
        $sql = ("SELECT * FROM evt_asistentes ");
        $rs = $usuario->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }
}
?>

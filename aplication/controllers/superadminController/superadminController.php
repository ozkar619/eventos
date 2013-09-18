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
    
     public function edita_evento($id_evento) {
        $eventos = new Modelo();
        $sql = ("SELECT * FROM evt_eventos
            WHERE id_evento = " . $id_evento);

        $rs = $eventos->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }
    public function elimina_evento($id_evento){
        $evento=new Evento();
        $where="id_evento=".$id_evento;
        $evento->elimina($where);
    }
}
?>

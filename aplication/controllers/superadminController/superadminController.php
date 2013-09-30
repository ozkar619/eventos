<?php

class SuperadminController {

    function SuperadminController() {
        
    }

    public function lista_eventos() {
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

    public function lista_administradores() {
        $eventoa = new Eventos_Admin();
        $sql = ("SELECT ea.id_evento_admin,a.nombre_asistente AS Nombre, a.apellido_paterno AS Apellido, a.email AS Correo, e.nombre_evento AS Evento
FROM evt_eventos_admin ea
INNER JOIN evt_asistentes a ON ea.id_asistente = a.id_asistente
INNER JOIN evt_eventos e ON ea.id_evento = e.id_evento");
        $rs = $eventoa->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }
    
    public function lista_tipos_usuarios() {
        $tu = new Tipo_Usuario();
        $sql = ("Select * from  evt_tipos_usuarios");
        $rs = $tu->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }
    
    public function lista_tipos_actividades() {
        $ta = new Tipo_Actividad();
        $sql = ("Select * from  evt_tipos_actividades");
        $rs = $ta->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }

    public function consulta_admins() {
        $eventoad = new Eventos_Admin();
        $sql = "SELECT a.id_asistente, a.nombre_asistente AS Nombre, a.apellido_paterno AS Apellido
FROM evt_tipos_usuarios tu
INNER JOIN evt_asistentes_tipos_usuarios atu ON tu.id_tipo_usuario = atu.id_tipo_usuario
INNER JOIN evt_asistentes a ON atu.id_asistente = a.id_asistente
WHERE atu.id_tipo_usuario =1";
        $rs = $eventoad->consulta_sql($sql);
        $arreglo = $rs->GetArray();
        return $arreglo;
    }

    public function consulta_atu($id_asistente) {
        $atu= new Asistente_Tipo_Usuario();
        $sql = "SELECT * 
FROM evt_tipos_usuarios
WHERE id_tipo_usuario NOT 
IN (

SELECT id_tipo_usuario
FROM evt_asistentes_tipos_usuarios
WHERE id_asistente = ".$id_asistente.")";
        $rs=$atu->consulta_sql($sql);
        $arreglo=$rs->GetArray();
        return $arreglo;
    }

    public function consulta_atus($id_asistente){
        $atu=new Asistente_Tipo_Usuario();
        $sql="SELECT tu.id_tipo_usuario, tu.tipo
FROM evt_asistentes_tipos_usuarios atu
INNER JOIN evt_tipos_usuarios tu ON atu.id_tipo_usuario = tu.id_tipo_usuario
WHERE atu.id_asistente =".$id_asistente;
        $rs=$atu->consulta_sql($sql);
        $arreglo=$rs->GetArray();
        return $arreglo;
    }
    
     public function consulta_etu($id_evento) {
        $etu= new Eventos_Tipos_Usuarios();
        $sql = "SELECT * 
FROM evt_tipos_usuarios
WHERE id_tipo_usuario NOT 
IN (

SELECT id_tipo_usuario
FROM evt_eventos_tipos_usuarios
WHERE id_evento = ".$id_evento.")";
        $rs=$etu->consulta_sql($sql);
        $arreglo=$rs->GetArray();
        return $arreglo;
    }

    public function consulta_etus($id_evento){
        $etu=new Eventos_Tipos_Usuarios();
        $sql="SELECT tu.id_tipo_usuario, tu.tipo
FROM evt_eventos_tipos_usuarios etu
INNER JOIN evt_tipos_usuarios tu ON etu.id_tipo_usuario = tu.id_tipo_usuario
WHERE etu.id_evento =".$id_evento;
        $rs=$etu->consulta_sql($sql);
        $arreglo=$rs->GetArray();
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

    public function elimina_evento($id_evento) {
        $evento = new Evento();
        $where = "id_evento=" . $id_evento;
        $evento->elimina($where);
    }

    public function elimina_actividades_evento($id_evento) {
        $actividad = new Actividades();
        $where = "id_evento=" . $id_evento;
        $actividad->elimina($where);
    }

    public function elimina_evento_ad($id_evento) {
        $eventoa = new Eventos_Admin();
        $where = "id_evento=" . $id_evento;
        $eventoa->elimina($where);
    }

    public function elimina_actividad($id_tipo_actividad){
        $actividad=new Actividades();
        $where="id_tipo_actividad=".$id_tipo_actividad;
        $actividad->elimina($where);
    }
    
    public function elimina_tipo_actividad($id_tipo_actividad){
        $ta=new Tipo_Actividad();
        $where="id_tipo_actividad=".$id_tipo_actividad;
        $ta->elimina($where);
    }
    
    public function elimina_evento_admin($id_evento_admin) {
        $eventoad = new Eventos_Admin();
        $where = "id_evento_admin=" . $id_evento_admin;
        $eventoad->elimina($where);
    }

     public function elimina_asistente_tipo_usuario($id_tipo_usuario, $id_asistente="null") {
        $atu=new Asistente_Tipo_Usuario();
        if($id_asistente=="null")
            $where="id_tipo_usuario=".$id_tipo_usuario;
        else
            $where = "id_asistente=" . $id_asistente." and id_tipo_usuario=".$id_tipo_usuario;
        $atu->elimina($where);
    }
    
    public function elimina_evento_tipo_usuario($id_tipo_usuario, $id_evento="null") {
        $etu=new Eventos_Tipos_Usuarios();
        if($id_evento=="null")
            $where="id_tipo_usuario=".$id_tipo_usuario;
        else
            $where = "id_evento=" . $id_evento." and id_tipo_usuario=".$id_tipo_usuario;
        $etu->elimina($where);
    }
    
    public function elimina_tipo_usuario($id_tipo_usuario){
        $tu=new Tipo_Usuario();
        $where="id_tipo_usuario=".$id_tipo_usuario;
        $tu->elimina($where);
    }
    
    public function actualiza_evento_admin($id_asistente, $id_evento_admin){
        $ea=new Eventos_Admin();
        $sql="UPDATE  `evt_eventos_admin` SET  `id_asistente` =".$id_asistente." WHERE id_evento_admin=".$id_evento_admin;
        $ea->consulta_sql($sql);
    }
    
    public function actualiza_tipo_usuario($id_tipo_usuario, $tipo){
        $tu=new Tipo_Usuario();
        $sql="UPDATE evt_tipos_usuarios SET tipo='".$tipo."' WHERE id_tipo_usuario=".$id_tipo_usuario;
        $tu->consulta_sql($sql);
        $rs=$tu->consulta_datos();
    }
    
    public function actualiza_tipo_actividad($id_tipo_actividad, $tipo_actividad){
        $ta=new Tipo_Actividad();
        $sql="UPDATE evt_tipos_actividades SET tipo_actividad='".$tipo_actividad."' WHERE id_tipo_actividad=".$id_tipo_actividad;
        $ta->consulta_sql($sql);
    }
    
    public function obtener_nombre_asistente($id_asistente){
        $usuario=new Usuario();
        $sql="Select * from evt_asistentes where id_asistente=".$id_asistente;
        $rs=$usuario->consulta_sql($sql);
        $arreglo=$rs->GetArray();
        return $arreglo;
    }
    
    public function obtener_nombre_evento($id_evento){
        $evento=new Evento();
        $sql="Select nombre_evento from evt_eventos where id_evento=".$id_evento;
        $rs=$evento->consulta_sql($sql);
        $arreglo=$rs->GetArray();
        return $arreglo;
    }
    
    public function obtener_nombre_tipo_usuario($id_tipo_usuario){
        $tu=new Tipo_Usuario();
        $sql="Select * from evt_tipos_usuarios where id_tipo_usuario=".$id_tipo_usuario;
        $rs=$tu->consulta_sql($sql);
        $arreglo=$rs->GetArray();
        return $arreglo;
    }
    public function obtener_nombre_tipo_actividad($id_tipo_actividad){
        $ta=new Tipo_Actividad();
        $sql="Select * from evt_tipos_actividades where id_tipo_actividad=".$id_tipo_actividad;
        $rs=$ta->consulta_sql($sql);
        $arreglo=$rs->GetArray();
        return $arreglo;
    }
    
    public function obtener_nombre_evento_usuario($id_evento_admin){
        $ea=new Eventos_Admin();
        $sql="SELECT e.nombre_evento, a.nombre_asistente, a.apellido_paterno
FROM evt_eventos_admin ea
INNER JOIN evt_eventos e ON ea.id_evento = e.id_evento
INNER JOIN evt_asistentes a ON ea.id_asistente = a.id_asistente where id_evento_admin=".$id_evento_admin;
        $rs=$ea->consulta_sql($sql);
        $arreglo=$rs->GetArray();
        return $arreglo;
    }
    
}

?>

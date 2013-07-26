<?php
class Modelo extends Conexion{
    
    public $db;
    
    function Modelo(){
<<<<<<< HEAD
        $this->db = ADONewConnection('mysql');
        $this->db->debug = false;
        $this->db->Connect('localhost','root','','EventosITC');
=======
        parent::Conexion();
>>>>>>> 99446f53eceaea2b3a614885377f8ff48b909bc3
    }
    
    public function consulta_datos(){
        $rs = $this->db->Execute('SELECT * from '.$this->nombre_tabla);
        $this->get_error($rs,'Error en consulta datos');
        return $rs;
    }
    
    public function consulta_sql($sql){
        $rs = $this->db->Execute($sql);
        $this->get_error($rs,'Error en consulta datos');
        return $rs;
    }
    
    
    public function inserta($rs){
        $sql_insert = $this->db->GetInsertSQL($this->nombre_tabla,$rs);
        return $this->get_error($this->db->Execute($sql_insert),'Error en Modelo.inserta');
    }
    
    public function get_error($result,$tipo_error){
        if($result === false){
            die('Redireccionar a la pagina de error '.$tipo_error);
            return false;
        }else{
            return true;
        }
    }
    
    public function show_grid($select = '*',$where = ' ',$num = '10'){
        $sql = "SELECT ".$select." 
                FROM ".$this->nombre_tabla." 
                ".$where;
        $grid = new ADODB_Pager($this->db,$sql);
        $grid->Render($rows_per_page=$num);
    }
    
    public function actualiza($id){
        if(is_integer($id)){
            $sql = "SELECT * FROM  ".$this->nombre_tabla." 
                WHERE id = ".$id; 
            
            $record = $this->db->Execute($sql);
            $rs = array();
            $rs['nombre'] = 'PEDROOOOOOO';
            $rs['email'] = 'pedroo@nnnnn.mmm';
            $rs['password'] = '0000000';
            
            $sql_update = $this->db->GetUpdateSQL($record,$rs);
            $this->get_error($this->db->Execute($sql_update),'Error al actualizar');
        }else{
            die('OJO ');
        }
    }
    
    //Tarea hacer una funcion que elimine por ID 
    public function elimina($where = 'null'){
       
        if($id == 'null')
            $sql = "DELETE FROM ".$this->nombre_tabla;
        else
            $sql = "DELETE FROM ".$this->nombre_tabla."
                    WHERE ".$where;
        
        $this->get_error($this->db->Execute($sql), "Error al eliminar");
        
    }
    
    
    
    
    
}
?>



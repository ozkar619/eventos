<?php

class LoginController extends Usuario{
    
    private $admins = array('oscar@itc.mx');
    
    public function valida_usuario($email,$password){
        //validar
        $sql = "select * 
                from evt_asistentes 
                where email = '".$email."' ";
        $rs = $this->consulta_sql($sql);
        $rows = $rs->GetArray();
        if( count($rows) == 1 ){
            $ps1 = trim($rows[0]['password']);
            $ps2 = trim(md5($password));
            
            if( $ps1 == $ps2 ){
                $this->inicia_sesion($rows[0]);
            }else{
                echo "password no encontrado";  
                return false;
            }
        }else{
            echo "Email no encontrado";
            return true;
        }
        
    }
    
    public function inicia_sesion($rows){
        
        
        $_SESSION['email']=$rows['email'];
        $_SESSION['nombre']=$rows['nombre'];
        $_SESSION['roles']=array('admin','maestro');
        $_SESSION['id_usuario']='1';
        
        if(in_array($rows['email'],$this->admins))
                $_SESSION['admin'] = 'isAdmin';
        
        header("location: inicio.php");
    }
  
    
}

?>




















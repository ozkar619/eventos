
<?php

class LoginController extends Usuario{
    
    private $superadmins = array('oscar@itc.mx','ramone.mendozam@gmail.com','maners.011@gmail.com','krauser_csr@hotmail.com');//Correo del superadministrador
    public function valida_usuario($email,$password){
        //validar
        $email=  addslashes($email);
        $sql = "select * 
                from evt_asistentes 
                where email = '".$email."' ";
        $rs = $this->consulta_sql($sql);
        $rows = $rs->GetArray();
        if( count($rows) == 1 ){
            $ps1 = trim($rows[0]['password']);
            $ps2 = trim(md5($password));
            
            if( $ps1 == $ps2 ){
                return $this->inicia_sesion($rows[0]);
            }else{
                echo "password no encontrado";  
                return false;
            }
        }else{
            echo "Email no encontrado";
            return false;
        }
        
    }
    
    public function inicia_sesion($rows){
        
        $_SESSION['email']=$rows['email'];
        $_SESSION['nombre']=$rows['nombre_asistente'];
        //$_SESSION['roles']=array('admin','maestro');
        $_SESSION['id_usuario'] = $rows['id_asistente'];
        
        $sql="select asi.email, ae.tipo from `evt_eventos_admin` ea
join `evt_asistentes` asi on asi.`id_asistente`=ea.`id_asistente`
where asi.email='".$rows['email']."'";
        $rs=$this->consulta_sql($sql);
        $rows1=$rs->GetArray();
        if(count($rows1)>0)
                $_SESSION['admin'] = 'isAdmin';
       
        if($rows1[0]['tipo']==1)
            $_SESSION['staff']='isStaff';
        
        if(in_array(trim($rows['email']), $this->superadmins)) 
            $_SESSION['superadmin']='isSuperAdmin';
        return true;
        //header("location: inicio.php");
    }
  
    
}

?>


















<?php
session_start();
include ('../../models/Conexion.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../models/Modelo.php');
include ('../../controllers/adminController/adminController.php');
include ('../layouts/header.php');

$eventos = new adminController();
$arreglo = $eventos->consulta_numero_eventos($_SESSION['id_usuario']);
?>       

<br/><br/>
<div class="span11 row-fluid">    
    
    <!-- UI de Presentacion al Administrador -->
    <div class="span11">
        <div class="hero-unit">
            <div class="span12">
                
                
                <!------ Aqui podria ir la Imagen del Admin :P -------->
                <div class="span3">                    
                    <img src="<?php echo BASEURL;?>views/images/user.jpg" class="img-rounded">                
                </div>
                <!-- ----------------------------------------------- -->
                     
                
                <!------ Mensajes de Bienvenida y Shalala -------------->
                <div class="span9">
                    <h1>Bienvenido <?php echo $_SESSION['nombre'] ?></h1>
                    <p>Tienes <?php echo $arreglo[0]['numero_eventos'] ?> Eventos a tu cargo</p>
                    <p>                        
                        <a class="btn btn-inverse" href="<?php echo BASEURL;?>views/admin/adminEvents.php">
                            Administrar un Evento
                        </a>                        
                    </p>
                </div>
                <!-- ----------------------------------------------- -->
                     
            </div>
            <p><?php echo 'Administrador' ?></p>
        </div>
    </div>
    <!------------------------- Fin UI del Admin ------------------------------------------------->

</div>

<?php include '../layouts/footer.php'; ?>
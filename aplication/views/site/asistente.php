<?php
session_start();
include ('../../models/Conexion.php');
include ('../../libs/adodb5/adodb-pager.inc.php');
include ('../../libs/adodb5/adodb.inc.php');
include ('../../models/Modelo.php');
include ('../../models/Asistentes_Actividades.php');
include ('../../controllers/siteController/asistenteController.php');
include ('../layouts/header.php');

if (isset($_SESSION['id_usuario']) && ($_GET['opc'] == 0 || $_GET['opc'] == 1 )) {
    $asist = new asistenteController();
    $actividades = $asist->regresa_actividades_usuario($_SESSION['id_usuario'], $_GET['opc']);
    $nombre = $asist->regresa_nombre($_SESSION['id_usuario']);
} else {
//    header('Location:inicio.php');
//    exit();
    //ojo  no puedo reedireccionar
}
?>
<?php if (isset($_POST['nombre_actividad'])) : ?>
    <script languaje="javascript">
        $(document).ready(function() {
            funct_modal('<?php echo $_POST['id_actividad'] ?>', '<?php echo $_POST['id_usuario'] ?>', '<?php echo $_POST['nombre_actividad'] ?>');
        });
    </script>   
<?php endif; ?>


<script src="../bootstrap/js/asistente.js"></script>

<div class="span12">
    <div class="span11">
        <table class="table table-bordered" >
            <legend class="padding2">Caracteristicas</legend>
            <thead>
                <tr>                    
                    <th>
                        Podrás dar de baja aquellas actividades las cuales cumplan las siguientes caracteristicas:
            <ul>
                <li>Sean gratis .</li>
                <li>Tengan precio ¡pero! aún no se hayan pagado.</li>
                <li>La fecha de inicio aún esté próxima.</li>
            </ul>
            Significado de los símbolos
            <ul>
                <li><span class="icon-fire"></span>Actividad pasada.</li>
                <li><span class="icon-ban-circle"></span>No se puede eliminar esta actividad.</li>  
                <li><span class="icon-trash"></span>Dar de baja la actividad.</li>
            </ul>
            </th>                    
            </tr>
            </thead>


        </table>
    </div>
    <div class="span11">
        <table class="table table-bordered formato" >
            <legend class="padding2">Actividades de <?php echo $nombre; ?></legend>
            <thead>
                <tr>                    
                    <th>Evento</th>                    
                    <th>Actividad</th>
                    <th>Precio</th>
                    <th>Fechas(Y-M-D)</th>                    
                    <th>Horarios</th>
                    <th>Opciones</th>  
                </tr>
            </thead>

            <tbody>
<?php foreach ($actividades as $key => $value) : ?>
                    <tr>
                        <th class="formato"><?php echo $actividades[$key]['nombre_evento'] ?></th>                    
                        <th><?php echo $actividades[$key]['nombre_actividad'] ?></th>
                        <?php if ($actividades[$key]['precio'] > 0): ?>
                            <th>$<?php echo $actividades[$key]['precio'] ?></th>
                        <?php else: ?>
                            <th>Gratis</th>
    <?php endif; ?>


                        <th><?php echo "Del " . $actividades[$key]['fecha_inicio'] . " al " . $actividades[$key]['fecha_fin'] ?></th>                    
                        <th><?php echo "De " . $actividades[$key]['hora_inicio'] . " a " . $actividades[$key]['hora_fin'] ?></th>

                        <?php if (strtotime($actividades[$key]['fecha_fin']) < strtotime(date("Y-m-d"))) : ?>
                            <th><span class="icon-fire"></span></th> 
                        <?php elseif ((($actividades[$key]['pago'] == 1) && ($actividades[$key]['precio'] > 0)) || (strtotime($actividades[$key]['fecha_inicio']) <= strtotime(date("Y-m-d")))) : ?>
                            <th> <span class="icon-ban-circle"></span> </th> 
    <?php else: ?>
                    <form method="post">
                        <input type="hidden" id="id_usuario" name="id_usuario" value=<?php echo $_SESSION['id_usuario']; ?>>
                        <input type="hidden" id="id_actividad" name="id_actividad" value=<?php echo $actividades[$key]['id_actividad']; ?>>
                        <input type="hidden" id="nombre_actividad" name="nombre_actividad" value="<?php echo $actividades[$key]['nombre_actividad'] ?>">
                        <td><input type="submit" class="btn-large icon-trash" value=""></td>           
                    </form>

                <?php endif ?>
                </tr>
<?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>


<div id="confirmacion" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div id = "actividad" ></div>

        <form method="post">
            <input type="hidden" id="id_u" name="id_u" >
            <input type="hidden" id="id_a" name="id_a" >
            <input type="submit" id="id_aa" name="id_aa" value="SI">          
        </form>
        <input type="submit" id="id_aa" name="id_aa" value="NO">  
    </div>
</div>

<div id="exit" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h2><div>BAJA EXITOSA</div></h2> 
    </div>
</div>

<?php
if (isset($_POST['id_a'])) {
    $asist->baja_actividad($_POST['id_u'], $_POST['id_a']);
//    header('Location:asistente.php?opc=' . $_GET['opc']);
//    exit();
}
?>

<?php include ('../layouts/footer.php'); ?>         
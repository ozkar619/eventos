
<div class="well">
    <ul class="nav nav-list">
        <li class="nav-header">Eventos</li>
        <li><a href="<?php echo BASEURL; ?>views/site/asistente.php?opc=1"><span class="icon-eye-open"></span>Mis actividades actuales</a></li>
        <li><a href="<?php echo BASEURL; ?>views/site/asistente.php?opc=0"><span class="icon-eye-open"></span>Todas mis actividades</a></li> 
        <li class="nav-header">Sesión</li>
        <li><a href="#"><span class="icon-wrench"></span>Modificar datos</a></li>
        <li><a href="<?php echo BASEURL; ?>views/site/cerrarSesion.php"><span class="icon-off"></span>Cerrar sesión</a></li> 
        
        <?php if(!($_SERVER["REQUEST_URI"] == "/eventos/aplication/views/site/inicio.php")):?>
        <li class="nav-header">Navegacion</li>
        <li><a href="<?php echo BASEURL; ?>views/site/inicio.php"><span class="icon-chevron-left"></span>Volver al inicio</a></li> 
        <?php endif;?>
    </ul>
</div>


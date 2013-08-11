<!-- ****** AUN INCOMPLETO ****** -->
<?php include '../layouts/header.php'; ?>

<br/><br/>

<!--------------- Menu De Opciones del Admin No NavBar ---------------->
<div class="span3">
    <ul class="nav nav-tabs nav-stacked">
        <li><a href="./initAdmin.php">Inicio</a></li>
        <li><a href="./adminEvents.php">Eventos</a></li>
        <li class="active"><a href="#">Configuracion</a></li>
        <!--<li><a href="#">Mas Opciones</a></li>-->
    </ul>
</div>                
<!--------------------------------------------------------------------->




<!------------- Formulario Para Actualizar Correo y Password ----------->
<div class="span8">
    <form>
        <fieldset>
            <legend>Perfil Usuario</legend>

            <div class="row-fluid span4">

                <label>Correo Electronico</label>
                <input type="email" placeholder="Nombre">

                <label>Password</label>
                <input type="password" placeholder="Nombre">
            </div>

            <div class="row-fluid span4">

                <label>Nuevo Password</label>
                <input type="password" placeholder="Nombre">

                <label>Confirmar Password</label>
                <input type="password" placeholder="Nombre">

            </div>

            <div class="row-fluid span3">
                <button type="submit" class="btn">Guardar Cambios</button>
            </div>
        </fieldset>
    </form>
</div>
<!-- -------------------------------------------------------------------- -->

<?php include '../layouts/footer.php'; ?>
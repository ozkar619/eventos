<!-- ****** AUN INCOMPLETO ****** -->
<?php 
session_start();
include '../layouts/header.php'; ?>

<br/><br/>
<!------------- Formulario Para Actualizar Correo y Password ----------->
<div class="span11 row-fluid">
    <form>
        <fieldset>
            <legend>Cambiar Contraseña</legend>

            <div class="row-fluid span4">

                <label>Correo Electronico</label>
                <input type="email" placeholder="email">

                <label>Password</label>
                <input type="password" placeholder="Password Actual">
            </div>

            <div class="row-fluid span4">

                <label>Nuevo Password</label>
                <input type="password" placeholder="Password Nuevo">

                <label>Confirmar Password</label>
                <input type="password" placeholder="Confirmar Password">

            </div>

            <div class="row-fluid span3">
                <button type="submit" class="btn">Guardar Cambios</button>
            </div>
        </fieldset>
    </form>
</div>
<!-- -------------------------------------------------------------------- -->

<?php include '../layouts/footer.php'; ?>
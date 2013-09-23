<?php
    session_start();
    if(!isset($_SESSION['superadmin']))
    header ("Location: ../site/inicio.php");
    include('../layouts/header.php');
?>
    <h2>El evento se ha eliminado</h2>
    <a href='../site/inicio.php'>Regresar</a>
<?php
include('../layouts/footer.php');
?>

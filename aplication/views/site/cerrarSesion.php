<?php
session_start();
unset($_SESSION);
session_destroy();
header("location: inicio.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

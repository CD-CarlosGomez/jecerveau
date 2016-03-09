<?php
include_once "controlador/Negocios.neg.php";
$conexion=new Conexion();
$dato=new Datos($conexion);
$pMySQLConection= new Negocio($dato);
?>
<?php
include_once "controlador/Negocios.neg.php";
$conexion=new Conexion();
$dataGridView=new DataGridView();
$dato=new Datos($conexion,$dataGridView);
$pMySQLConection= new Negocio($dato);
?>
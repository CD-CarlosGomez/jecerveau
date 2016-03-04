<?php
	$txtNombreEmpresa_p=$_POST['txtNombreEmpresa_h'];
	$maximo=$dato->getQueryNuevoCodigo('ibenterprice','pkEnterprice');
	$query2 = "INSERT INTO ibenterprice VALUES ($maximo,'$txtNombreEmpresa_p',NULL);";
	$mysql_result =$dato->MySQLiComando($query2);
?> 
    
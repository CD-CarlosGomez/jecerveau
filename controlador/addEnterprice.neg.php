<?php
	$txt_NombreEmpresa_p=$_POST['txt_NombreEmpresa_h'];
	$maximo=$dato->getQueryNuevoCodigo('ibenterprice','pkEnterprice');
	$query2 = "INSERT INTO ibenterprice VALUES ($maximo,'$txt_NombreEmpresa_p',NULL,null,null,null,null,1);";
	$mysql_result =$dato->MySQLiComando($query2);
?> 
    
<?php	
	$maximo=$dato->getQueryNuevoCodigo('ibenterprice','pkEnterprice');
	$query2 = "INSERT INTO ibenterprice VALUES ($maximo,'$ptxtNombreEmpresa_p',NULL);";
	$mysql_result =$dato->MySQLiComando($query2);
?> 
    
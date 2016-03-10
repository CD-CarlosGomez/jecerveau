<?php 
	
	if(!isset($txt_NombreEmpresa_p) && !isset($hdn_pkEnterprice_p)){
			@$hdn_pkEnterprice_p=$_POST['hdn_pkEnterprice_h'];
			@$txt_NombreEmpresa_p=$_POST['txt_NombreEmpresa_h'];
	}
	$MySQLiComandoUpdate="UPDATE ibenterprice SET enterpricegroupname='$txt_NombreEmpresa_p' WHERE pkenterprice=$hdn_pkEnterprice_p;";
	$mySQLiResult=$dato->MySQLiComando("UPDATE ibenterprice SET enterpricegroupname='$txt_NombreEmpresa_p' WHERE pkenterprice=$hdn_pkEnterprice_p;");
	$classECA1="in";
	$classECA2="";
?>
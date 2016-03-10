<?php 
	
	if(!isset($txt_NombreEmpresa_p) && isset($hdn_pkEnterprice_p)){
			@$hdn_pkEnterprice_p=$_POST['hdn_pkEnterprice_h'];
			@$txt_NombreEmpresa_p=$_POST['txt_NombreEmpresa_h'];
			echo $MySQLiComandoUpdate="UPDATE ibenterprice SET enterpricegroupname='$txt_NombreEmpresa_p' WHERE pkenterprice=$hdn_pkEnterprice_p";
	}	
	
	if (!isset($btn_editEnterprise_p)){
		$btn_editEnterprise_p=$_POST['btn_editEnterprise_h'];
	}
	echo $mySQLiComando="SELECT enterpricegroupname FROM ibenterprice WHERE pkenterprice=$btn_editEnterprise_p;";
	$mySQLiResult=$dato->MySQLiComando($mySQLiComando);
		$mySQLiResult->data_seek(0);
		$row=$mySQLiResult->fetch_row();
		$rowEnterprise=($row[0]);
		$classECA2=($row[0]==TRUE)?"in":"";
		$classECA1=($row[0]==TRUE)?"":"in";
		$mySQLiResult->close();
	
	
?>
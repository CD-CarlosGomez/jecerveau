<?php 
	if (!isset($btn_editEnterprise_p)){
		$btn_editEnterprise_p=$_POST['btn_editEnterprise_h'];
	}
	$mySQLiComando="SELECT enterpricegroupname FROM ibenterprice WHERE pkenterprice=$btn_editEnterprise_p;";
	$mySQLiResult=$dato->MySQLiComando($mySQLiComando);
		$mySQLiResult->data_seek(0);
		$row=$mySQLiResult->fetch_row();
		$rowEnterprise=($row[0]);
		$classECA2=($row[0]==TRUE)?"in":"";
		$classECA1=($row[0]==TRUE)?"":"in";
		$mySQLiResult->close();
	
	
?>
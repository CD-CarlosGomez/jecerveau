<?php 
if (!isset($btn_deleteEnterprise_p)){
		$btn_deleteEnterprise_p=$_POST['btn_deleteEnterprise_h'];
	}
	$MySQLiComandoDelete="UPDATE ibenterprice SET Active=0 WHERE pkenterprice=$btn_deleteEnterprise_p;";
	$mySQLiResult=$dato->MySQLiComando("UPDATE ibenterprice SET Active=0 WHERE pkenterprice=$btn_deleteEnterprise_p;");
	$classECA1="in";
	$classECA2="";
?>
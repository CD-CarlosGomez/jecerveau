<?php
	$txtLegalName_p=$_POST['txtLegalName_h'];
		$txtCommercialName_p=$_POST['txtCommercialName_h'];
		$txtStreet_p=$_POST['txtStreet_h'];
		$txtExtNumber_p=$_POST['txtExtNumber_h'];
		$txtIntNumber_p=$_POST['txtIntNumber_h'];
		$txtRegion_p=$_POST['txtRegion_h'];
		$txtZone_p=$_POST['txtZone_h'];
		$txtProvince_p=$_POST['txtProvince_h'];
		$txtZipCode_p=$_POST['txtZipCode_h'];
		
	$maximo=$dato->getQueryNuevoCodigo('company','pkCompany');
	$query2 = "INSERT INTO company VALUES (
					$maximo,
					'$txtLegalName_p',
					'$txtCommercialName_p',
					NULL,
					NULL,
					'$txtStreet_p',
					'$txtExtNumber_p',
					'$txtIntNumber_p',
					'$txtRegion_p',
					'$txtZone_p',
					'$txtProvince_p',
					'$txtZipCode_p',
					NULL,
					NULL,
					NULL,
					NULL,
					1,
					1);";
	$mysql_result =$dato->MySQLiComando($query2);
?>
<?php
	$txtBOName_p=$_POST['txtBOName_h'];
	$txtBOStreet_p=$_POST['txtBOStreet_h'];
	$txtBOExtNumber_p=$_POST['txtBOExtNumber_h'];
	$txtBOIntNumber_p=$_POST['txtBOIntNumber_h'];
	$txtBORegion_p=$_POST['txtBORegion_h'];
	$txtBOZone_p=$_POST['txtBOZone_h'];
	$txtBOProvince_p=$_POST['txtBOProvince_h'];
	$txtBOZipCode_p=$_POST['txtBOZipCode_h'];
		
	$maximo=$dato->getQueryNuevoCodigo('branchoffice','pkBranchOffice');
	$query2 = "INSERT INTO branchoffice VALUES (
					$maximo,
					1,
					'$txtBOName_p',
					'$txtBOStreet_p',
					'$txtBOExtNumber_p',
					'$txtBOIntNumber_p',
					'$txtBORegion_p',
					'$txtBOZone_p',
					'$txtBOProvince_p',
					'$txtBOZipCode_p',
					NULL,
					NULL,
					NULL,
					NULL,
					1);";
	$mysql_result =$dato->MySQLiComando($query2);
?>
<?php	//view jobs script
//include_once "Negocios.neg.php";
if (!isset($ptxtNombreEmpresa_p)) {
  echo $ptxtNombreEmpresa_p=$_POST['ptxtNombreEmpresa_h'];
  //echo $max=$dato->getQueryNuevoCodigo('ibenterprice','pkEnterprice');
  // Insert company into the tickets table
	$query = "INSERT INTO ibenterprice";
	$query .= " (EnterpriceGroupName,EnterpriceDescription)";
	echo $query .= " VALUES ('".$ptxtNombreEmpresa_p."',NULL);";
  //$mysql_result =$dato->MySQLiComando($query);

  if ($mysql_result) {
		echo "Se inserto con exito";
    }
    else { 
        print "MySQL Error is:  ";
      }
    }
	else{
		Echo "no se recibio datos";
		
	}
   
    